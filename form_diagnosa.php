<?php
include '../db_connect.php';
$gejala = $conn->query("SELECT * FROM gejala");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Diagnosa Penyakit Kulit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #e8f5e9, #ffffff); /* Hijau muda */
            color: #1b5e20;
            padding: 40px;
            margin: 0;
        }

        .container {
            background-color: white;
            max-width: 700px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2e7d32;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            padding: 10px;
            border: 1px solid #a5d6a7;
            border-radius: 6px;
            font-size: 15px;
        }

        .gejala-item {
            background: #e8f5e9;
            padding: 10px 15px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            font-size: 16px;
        }

        .gejala-item input {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #43a047;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 15px;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2e7d32;
        }

        .note {
            font-size: 13px;
            margin-top: 20px;
            color: #444;
            text-align: center;
        }

        .btn-kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #f1f8e9;
            color: #388e3c;
            text-decoration: none;
            border: 1px solid #388e3c;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
        }

        .btn-kembali:hover {
            background-color: #dcedc8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Diagnosa Penyakit Kulit</h2>
    <form method="post" action="../proses_naive_bayes.php">
        <label>Nama:</label>
        <input type="text" name="nama" required placeholder="Masukkan nama Anda">

        <label>Umur:</label>
        <input type="number" name="umur" required placeholder="Masukkan umur Anda">

        <label>Gejala yang Dirasakan:</label>
        <?php if ($gejala->num_rows > 0): ?>
            <?php while ($g = $gejala->fetch_assoc()): ?>
                <label class="gejala-item">
                    <input type="checkbox" name="gejala[]" value="<?= $g['id'] ?>">
                    <?= $g['kode_gejala'] ?> - <?= $g['nama_gejala'] ?>
                </label>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Tidak ada data gejala ditemukan.</p>
        <?php endif; ?>

        <input type="submit" value="🩺 Lakukan Diagnosa">
    </form>
    <div class="note">
        Silakan lengkapi data dan centang gejala yang Anda alami, lalu klik tombol "Lakukan Diagnosa".
    </div>

    <div style="text-align: center;">
        <a href="../index.php" class="btn-kembali">🏠 Kembali ke Home</a>
    </div>
</div>
</body>
</html>
