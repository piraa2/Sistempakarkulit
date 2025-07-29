<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$data = $conn->query("SELECT bp.id, p.nama_penyakit, g.nama_gejala, bp.nilai_probabilitas
                      FROM basis_pengetahuan bp
                      JOIN penyakit p ON bp.id_penyakit = p.id
                      JOIN gejala g ON bp.id_gejala = g.id");


?>

<!DOCTYPE html>
<html>
<head>
    <title>Basis Pengetahuan</title>
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
            color: #2e7d32;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #a5d6a7;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #c8e6c9;
        }
        tr:nth-child(even) {
            background-color: #e8f5e9;
        }
        .btn {
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
        .btn-tambah {
            background-color: #43a047;
            color: white;
            margin-bottom: 15px;
        }
        .btn-tambah:hover {
            background-color: #388e3c;
        }
        .btn-edit {
            background-color: #66bb6a;
            color: white;
        }
        .btn-edit:hover {
            background-color: #43a047;
        }
        .btn-hapus {
            background-color: #d32f2f;
            color: white;
        }
        .btn-hapus:hover {
            background-color: #b71c1c;
        }
        .btn-back {
            margin-top: 20px;
            display: inline-block;
            color: #2e7d32;
            font-weight: bold;
            text-decoration: none;
        }
        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>📚 Basis Pengetahuan</h2>
    <a href="tambah_basis_pengetahuan.php" class="btn btn-tambah">➕ Tambah Relasi</a>
    <table>
        <tr>
            <th>No</th>
            <th>Penyakit</th>
            <th>Gejala</th>
            <th>Nilai Probabilitas</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama_penyakit']) ?></td>
                <td><?= htmlspecialchars($row['nama_gejala']) ?></td>
                <td><?= $row['nilai_probabilitas'] ?></td>
                <td>
                    <a href="edit_basis_pengetahuan.php?id=<?= $row['id'] ?>" class="btn btn-edit">✏️ Edit</a>
                    <a href="hapus_basis_pengetahuan.php?id=<?= $row['id'] ?>" class="btn btn-hapus" onclick="return confirm('Yakin hapus data ini?')">🗑️ Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="dashboard.php" class="btn-back">← Kembali ke Dashboard</a>
</div>
</body>
</html>
