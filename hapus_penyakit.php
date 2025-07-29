<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$id = $_GET['id'] ?? 0;

// Optional: Cek apakah data ada
$data = $conn->query("SELECT * FROM penyakit WHERE id = $id")->fetch_assoc();

if (!$data) {
    echo "<p style='color:red;'>Data tidak ditemukan.</p>";
    exit;
}

// Hapus data
$conn->query("DELETE FROM penyakit WHERE id = $id");

header("Location: penyakit.php?pesan=deleted");
exit;
?>
