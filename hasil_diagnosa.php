<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$hasil = $conn->query("SELECT * FROM hasil_diagnosa ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Diagnosa - Sistem Pakar Kulit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #ffffff);
            color: #1b5e20;
            padding: 40px;
        }

        .container {
            background-color: white;
            max-width: 1000px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #a5d6a7;
            text-align: left;
        }

        th {
            background-color: #c8e6c9;
            color: #1b5e20;
        }

        tr:nth-child(even) {
            background-color: #e8f5e9;
        }

        .btn-back, .btn-cetak {
            margin-top: 20px;
            display: inline-block;
            background-color: #43a047;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            margin-right: 10px;
        }

        .btn-back:hover, .btn-cetak:hover {
            background-color: #2e7d32;
        }

        .btn-hapus {
            background-color: #d32f2f;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 13px;
        }

        .btn-hapus:hover {
            background-color: #b71c1c;
        }

        /* CSS khusus cetak */
        @media print {
            .btn-back, .btn-cetak, .btn-hapus {
                display: none !important;
            }

            body {
                background: white !important;
                padding: 0;
            }

            .container {
                box-shadow: none;
                padding: 0;
                border-radius: 0;
            }
        }
    </style>
    <script>
        function cetakPDF() {
            window.print();
        }
    </script>
</head>
<body>
<div class="container">

        <a href="#" class="btn-cetak" onclick="cetakPDF()">🖨️ Cetak PDF</a>


    <h2>📊 Laporan Hasil Diagnosa</h2>

    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Tanggal</th>
            <th>Gejala Dipilih (ID)</th>
            <th>Penyakit Hasil</th>
            <th>Probabilitas</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = $hasil->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['umur']) ?> tahun</td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= htmlspecialchars($row['gejala_dipilih']) ?></td>
                <td><?= htmlspecialchars($row['hasil_penyakit']) ?></td>
                <td><?= number_format($row['nilai_naive'], 4) ?></td>
                <td>
                    <a href="hapus_hasil.php?id=<?= $row['id'] ?>" class="btn-hapus"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <a href="dashboard.php" class="btn-back">← Kembali ke Dashboard</a>
</div>
</body>
</html>
