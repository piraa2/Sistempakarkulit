<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout - Sistem Pakar Diagnosa Kulit</title>
    <meta http-equiv="refresh" content="3;url=../index.php">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #e8f5e9, #ffffff); /* Hijau muda */
            color: #1b5e20;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .box {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 500px;
        }

        h2 {
            color: #2e7d32;
            margin-bottom: 20px;
        }

        .spinner {
            border: 5px solid #c8e6c9;
            border-top: 5px solid #43a047;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        p {
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h2>Anda berhasil logout.</h2>
        <div class="spinner"></div>
        <p>Mengarahkan kembali ke halaman utama...</p>
    </div>
</body>
</html>
