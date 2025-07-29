<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../db_connect.php';

$id = $_GET['id'];
$conn->query("DELETE FROM gejala WHERE id = $id");

header("Location: gejala.php");
exit;
?>
