<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: 
                linear-gradient(to bottom right, rgba(232, 245, 233, 0.9), rgba(255, 255, 255, 0.9)),
                url('../assets/background1.jpg')
            background-size: cover;
            color: #1b5e20;
        }

        .navbar {
            background-color: #2e7d32;
            padding: 20px;
            color: white;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .container {
            padding: 120px;
            max-width: 900px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2e7d32;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        .menu a {
            display: block;
            text-align: center;
            font-size: 27px;
            padding: 30px;
            background: #c8e6c9;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            color: #1b5e20;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .menu a:hover {
            background-color: #a5d6a7;
            transform: translateY(-3px);
        }

        .logout {
            text-align: center;
            margin-top: 40px;
        }

        .logout a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: bold;
            background: #e8f5e9;
            padding: 10px 20px;
            border-radius: 6px;
            border: 1px solid #a5d6a7;
        }

        .logout a:hover {
            background: #c8e6c9;
        }
    </style>
</head>
<body>

<div class="navbar">
    SISTEM PAKAR DIAGNOSA PENYAKIT KULIT MENGGUNAKAN METODE NAIVE BAYES
</div>

<div class="container">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['admin']) ?></h2>

    <div class="menu">
        <a href="penyakit.php">📋 <br>Data Penyakit</a>
        <a href="gejala.php">📝 <br>Data Gejala</a>
        <a href="basis_pengetahuan.php">📚 <br>Basis Pengetahuan</a>
        <a href="hasil_diagnosa.php">📈 <br>Laporan Diagnosa</a>
    </div>

    <div class="logout">
        <a href="logout.php">🚪 Logout</a>
    </div>
</div>

</body>
</html>
