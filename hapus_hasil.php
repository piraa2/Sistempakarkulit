<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$id = $_GET['id'] ?? 0;
$conn->query("DELETE FROM hasil_diagnosa WHERE id = $id");

header("Location: hasil_diagnosa.php");
exit;
?>
