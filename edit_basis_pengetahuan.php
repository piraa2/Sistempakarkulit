<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM basis_pengetahuan WHERE id = $id")->fetch_assoc();
$penyakit = $conn->query("SELECT * FROM penyakit");
$gejala = $conn->query("SELECT * FROM gejala");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_penyakit = $_POST['id_penyakit'];
    $id_gejala = $_POST['id_gejala'];
    $nilai = $_POST['nilai_probabilitas'];

    $stmt = $conn->prepare("UPDATE basis_pengetahuan SET id_penyakit=?, id_gejala=?, nilai_probabilitas=? WHERE id=?");
    $stmt->bind_param("iidi", $id_penyakit, $id_gejala, $nilai, $id);
    $stmt->execute();

    header("Location: basis_pengetahuan.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Basis Pengetahuan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #ffffff); /* hijau muda */
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
            margin-bottom: 25px;
        }
        label {
            font-weight: bold;
            color: #388e3c;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border-radius: 6px;
            border: 1px solid #a5d6a7;
            box-sizing: border-box;
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
            color: #2e7d32;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>✏️ Edit Basis Pengetahuan</h2>
    <form method="post">
        <label for="id_penyakit">Pilih Penyakit:</label>
        <select name="id_penyakit" id="id_penyakit" required>
            <?php while ($p = $penyakit->fetch_assoc()): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $data['id_penyakit'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($p['nama_penyakit']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="id_gejala">Pilih Gejala:</label>
        <select name="id_gejala" id="id_gejala" required>
            <?php while ($g = $gejala->fetch_assoc()): ?>
                <option value="<?= $g['id'] ?>" <?= $g['id'] == $data['id_gejala'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($g['nama_gejala']) ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label for="nilai_probabilitas">Nilai Probabilitas (0 - 1):</label>
        <input type="number" name="nilai_probabilitas" id="nilai_probabilitas" step="0.01" min="0" max="1" value="<?= $data['nilai_probabilitas'] ?>" required>

        <input type="submit" class="btn" value="Simpan Perubahan">
        <a href="basis_pengetahuan.php" class="back-link">← Kembali</a>
    </form>
</div>
</body>
</html>
