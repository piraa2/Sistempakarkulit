<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$gejala = $conn->query("SELECT * FROM gejala");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Gejala - Sistem Pakar Kulit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #ffffff); /* Hijau muda */
            color: #1b5e20;
            padding: 40px;
        }

        .container {
            background: #ffffff;
            max-width: 900px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 128, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #a5d6a7;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #c8e6c9;
            color: #1b5e20;
        }

        tr:nth-child(even) {
            background-color: #e8f5e9;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .btn-edit {
            background-color: #43a047;
            color: white;
            margin-bottom: 6px;
        }

        .btn-edit:hover {
            background-color: #388e3c;
        }

        .btn-hapus {
            background-color: #d32f2f;
            color: white;
        }

        .btn-hapus:hover {
            background-color: #b71c1c;
        }

        .btn-tambah {
            background: #66bb6a;
            color: white;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background: #43a047;
        }

        .btn-dashboard {
            background-color: #388e3c;
            color: white;
            margin-top: 20px;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-dashboard:hover {
            background-color: #2e7d32;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>📄 Data Gejala</h2>

    <a href="tambah_gejala.php" class="btn btn-tambah">➕ Tambah Gejala</a>

    <table>
        <tr>
            <th>No</th>
            <th>Kode Gejala</th>
            <th>Nama Gejala</th>
            <th>Nilai Probabilitas</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($g = $gejala->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($g['kode_gejala']) ?></td>
            <td><?= htmlspecialchars($g['nama_gejala']) ?></td>
            <td><?= htmlspecialchars($g['nilai_probabilitas']) ?></td>
            <td>
                <a href="edit_gejala.php?id=<?= $g['id'] ?>" class="btn btn-edit">✏️ Edit</a><br>
                <a href="hapus_gejala.php?id=<?= $g['id'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="dashboard.php" class="btn btn-dashboard">← Kembali ke Dashboard</a>
</div>
</body>
</html>
