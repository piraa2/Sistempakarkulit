<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$id = $_GET['id'] ?? 0;
$data = $conn->query("SELECT * FROM penyakit WHERE id = $id")->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $solusi = $_POST['solusi'];

    $stmt = $conn->prepare("UPDATE penyakit SET kode_penyakit=?, nama_penyakit=?, deskripsi=?, solusi=? WHERE id=?");
    $stmt->bind_param("ssssi", $kode, $nama, $deskripsi, $solusi, $id);

    if ($stmt->execute()) {
        header("Location: penyakit.php?pesan=updated");
        exit;
    } else {
        echo "<p style='color:red;'>Gagal mengupdate data penyakit.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Penyakit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #ffffff); /* hijau muda */
            color: #1b5e20;
            padding: 40px;
        }

        .container {
            background: #ffffff;
            max-width: 700px;
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
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #388e3c;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #a5d6a7;
            border-radius: 6px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            background-color: #43a047;
            color: white;
            padding: 12px;
            margin-top: 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #2e7d32;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
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
    <h2>✏️ Edit Data Penyakit</h2>
    <form method="post">
        <label>Kode Penyakit</label>
        <input type="text" name="kode" value="<?= htmlspecialchars($data['kode_penyakit']) ?>" required>

        <label>Nama Penyakit</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama_penyakit']) ?>" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>

        <label>Solusi</label>
        <textarea name="solusi" required><?= htmlspecialchars($data['solusi']) ?></textarea>

        <input type="submit" value="💾 Update">
    </form>
    <a href="penyakit.php" class="back-link">← Kembali ke Data Penyakit</a>
</div>
</body>
</html>
