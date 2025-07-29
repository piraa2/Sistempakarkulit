<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$penyakit = $conn->query("SELECT * FROM penyakit");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penyakit - Sistem Pakar Kulit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #ffffff); /* hijau muda */
            color: #1b5e20;
            padding: 40px;
        }

        .container {
            background: white;
            max-width: 900px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 128, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2e7d32;
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
            vertical-align: top;
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
            margin-top: 10px;
            margin-bottom: 20px;
            padding: 10px 15px;
            border-radius: 6px;
            display: inline-block;
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

    <h2>📋 Data Penyakit Kulit</h2>

    <a href="tambah_penyakit.php" class="btn btn-tambah">➕ Tambah Penyakit</a>

    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Penyakit</th>
            <th>Deskripsi</th>
            <th>Solusi</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($p = $penyakit->fetch_assoc()): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($p['kode_penyakit']) ?></td>
            <td><?= htmlspecialchars($p['nama_penyakit']) ?></td>
            <td><?= htmlspecialchars($p['deskripsi']) ?></td>
            <td><?= htmlspecialchars($p['solusi']) ?></td>
            <td>
                <a href="edit_penyakit.php?id=<?= $p['id'] ?>" class="btn btn-edit">✏️ Edit</a><br>
                <a href="hapus_penyakit.php?id=<?= $p['id'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <a href="dashboard.php" class="btn btn-dashboard">← Kembali ke Dashboard</a>
</div>
</body>
</html>
