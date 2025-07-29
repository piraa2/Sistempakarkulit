<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode_gejala'];
    $nama = $_POST['nama_gejala'];
    $nilai = $_POST['nilai_probabilitas'];

    $stmt = $conn->prepare("INSERT INTO gejala (kode_gejala, nama_gejala, nilai_probabilitas) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $kode, $nama, $nilai);
    $stmt->execute();

    header("Location: gejala.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Gejala</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #ffffff); /* hijau muda */
            color: #1b5e20;
            padding: 40px;
        }

        .container {
            background: white;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2e7d32;
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            color: #388e3c;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            border-radius: 6px;
            border: 1px solid #a5d6a7;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 18px;
            background: #43a047;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        .btn:hover {
            background: #2e7d32;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #2e7d32;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>➕ Tambah Gejala</h2>
    <form method="post">
        <label>Kode Gejala:</label>
        <input type="text" name="kode_gejala" required>

        <label>Nama Gejala:</label>
        <input type="text" name="nama_gejala" required>

        <label>Nilai Probabilitas (0 - 1):</label>
        <input type="number" name="nilai_probabilitas" step="0.01" min="0" max="1" required>

        <input type="submit" value="💾 Simpan" class="btn">
        <a href="gejala.php" class="back-link">← Kembali ke Data Gejala</a>
    </form>
</div>
</body>
</html>
