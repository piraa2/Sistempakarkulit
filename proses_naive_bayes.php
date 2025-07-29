<?php
include 'db_connect.php';

$nama = $_POST['nama'] ?? 'Pasien';
$umur = $_POST['umur'] ?? '-';
$gejala_dipilih = $_POST['gejala'] ?? [];

if (count($gejala_dipilih) < 1) {
    die("<p style='color:red;'>Silakan pilih minimal 1 gejala</p>");
}

// Ambil gejala terpilih
$gejala_nama = [];
if (!empty($gejala_dipilih)) {
    $id_gejala = implode(",", $gejala_dipilih);
    $get = $conn->query("SELECT * FROM gejala WHERE id IN ($id_gejala)");
    while ($g = $get->fetch_assoc()) {
        $gejala_nama[$g['id']] = $g['nama_gejala'];
    }
}

$penyakit = $conn->query("SELECT * FROM penyakit");
$hasil = [];

while ($p = $penyakit->fetch_assoc()) {
    $id_penyakit = $p['id'];
    $perkalian = [];
    $total_prob = 1;

    foreach ($gejala_dipilih as $g) {
        $q = $conn->query("SELECT nilai_probabilitas FROM basis_pengetahuan 
                           WHERE id_penyakit=$id_penyakit AND id_gejala=$g");
        $prob = ($q->num_rows > 0) ? $q->fetch_assoc()['nilai_probabilitas'] : 0.01;
        $perkalian[] = $prob;
        $total_prob *= $prob;
    }

    $hasil[] = [
        'nama' => $p['nama_penyakit'],
        'nilai' => $total_prob,
        'perhitungan' => implode(" × ", $perkalian)
    ];
}

usort($hasil, fn($a, $b) => $b['nilai'] <=> $a['nilai']);
$tertinggi = $hasil[0];

// Simpan hasil ke DB
$conn->query("INSERT INTO hasil_diagnosa (nama, umur, tanggal, gejala_dipilih, hasil_penyakit, nilai_naive)
              VALUES ('$nama', '$umur', NOW(), '" . implode(",", $gejala_dipilih) . "', '{$tertinggi['nama']}', {$tertinggi['nilai']})");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Diagnosa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #e8f5e9;
            padding: 40px;
            color: #1b5e20;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2e7d32;
        }

        ul {
            background: #f1f8e9;
            padding: 10px 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #a5d6a7;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #c8e6c9;
        }

        tr:nth-child(even) {
            background-color: #f1f8e9;
        }

        .highlight {
            background-color: #a5d6a7;
            font-weight: bold;
        }

        .btn {
            background-color: #43a047;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 30px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #2e7d32;
        }

        .rumus {
            font-family: monospace;
            font-size: 0.95em;
            background: #e0f2f1;
            padding: 8px;
            border-radius: 6px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>📋 Hasil Diagnosa Naive Bayes</h2>

    <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
    <p><strong>Umur:</strong> <?= htmlspecialchars($umur) ?> tahun</p>
    <p><strong>Gejala yang Dipilih:</strong></p>
    <ul>
        <?php foreach ($gejala_dipilih as $gid): ?>
            <li><?= htmlspecialchars($gejala_nama[$gid] ?? "Gejala ID $gid") ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Perhitungan Probabilitas:</h3>
    <table>
        <thead>
            <tr>
                <th>Penyakit</th>
                <th>Perkalian Probabilitas</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $i => $h): ?>
                <tr class="<?= $i === 0 ? 'highlight' : '' ?>">
                    <td><?= $h['nama'] ?></td>
                    <td class="rumus"><?= $h['perhitungan'] ?></td>
                    <td><?= number_format($h['nilai'], 6) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>✅ Diagnosa: <span style="color: #2e7d32"><?= $tertinggi['nama'] ?></span></h3>

    <a href="user/form_diagnosa.php" class="btn">🔄 Diagnosa Ulang</a>
</div>
</body>
</html>
