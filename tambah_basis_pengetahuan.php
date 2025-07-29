<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$penyakit = $conn->query("SELECT * FROM penyakit");
$gejala = $conn->query("SELECT * FROM gejala");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_penyakit = $_POST['id_penyakit'];
    $id_gejala = $_POST['id_gejala'];
    $nilai = $_POST['nilai_probabilitas'];

    $stmt = $conn->prepare("INSERT INTO basis_pengetahuan (id_penyakit, id_gejala, nilai_probabilitas) VALUES (?, ?, ?)");
    $stmt->bind_param("iid", $id_penyakit, $id_gejala, $nilai);
    $stmt->execute();

    header("Location: basis_pengetahuan.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Basis Pengetahuan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #ffffff); /* Hijau sangat muda */
            color: #1b5e20;
            padding: 40px;
        }
        .container {
            background: #ffffff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2e7d32;
        }
        label {
            font-weight: bold;
            color: #388e3c;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            border-radius: 6px;
            border: 1px solid #a5d6a7;
        }
        .btn {
            padding: 10px 20px;
            background-color: #43a047;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #2e7d32;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            color: #1b5e20;
            font-weight: bold;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>➕ Tambah Basis Pengetahuan</h2>
    <form method="post">
        <label>Pilih Penyakit:</label>
        <select name="id_penyakit" required>
            <option value="">-- Pilih Penyakit --</option>
            <?php while ($p = $penyakit->fetch_assoc()): ?>
                <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['nama_penyakit']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Pilih Gejala:</label>
        <select name="id_gejala" required>
            <option value="">-- Pilih Gejala --</option>
            <?php while ($g = $gejala->fetch_assoc()): ?>
                <option value="<?= $g['id'] ?>"><?= htmlspecialchars($g['nama_gejala']) ?></option>
            <?php endwhile; ?>
        </select>

        <label>Nilai Probabilitas (0 - 1):</label>
        <input type="number" name="nilai_probabilitas" step="0.01" min="0" max="1" required>

        <input type="submit" class="btn" value="Simpan">
        <a href="basis_pengetahuan.php" class="back-link">← Kembali</a>
    </form>
</div>
</body>
</html>
