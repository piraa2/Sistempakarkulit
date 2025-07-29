<?php
session_start();
include '../db_connect.php';

$pesan_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = $conn->query("SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if ($q->num_rows > 0) {
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
        exit;
    } else {
        $pesan_error = "Login gagal. Cek username atau password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - Sistem Pakar Kulit</title>
    <style>
        body {
            background: linear-gradient(to right, #d0f0c0, #ffffff);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            width: 360px;
        }

        .login-container h2 {
            text-align: center;
            color: #2e7d32;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #1b5e20;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #a5d6a7;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #43a047;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2e7d32;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #666;
        }

                .btn-kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background-color: #f1f8e9;
            color: #388e3c;
            text-decoration: none;
            border: 1px solid #388e3c;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
        }

        .btn-kembali:hover {
            background-color: #dcedc8;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login Admin</h2>

        <?php if ($pesan_error): ?>
            <div class="error"><?= $pesan_error ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>

        <div style="text-align: center;">
        <a href="../index.php" class="btn-kembali">🏠 Kembali ke Home</a>
    </div>
    
        <div class="footer">
            Sistem Pakar Diagnosa Penyakit Kulit | © <?= date('Y') ?>
        </div>
        
    </div>
</body>
</html>
