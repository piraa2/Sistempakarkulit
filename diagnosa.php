<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sistem Pakar Penyakit Kulit</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: #e8f5e9; /* hijau sangat muda */
      color: #1b5e20;
    }

    nav {
      background-color: #2e7d32; /* hijau tua */
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 60px;
    }

    .logo {
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
    }

    .nav-links a {
      color: #ffffff;
      margin-left: 30px;
      text-decoration: none;
      font-weight: 500;
    }

    .nav-links a:hover {
      text-decoration: underline;
    }

    .hero {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 60px;
      min-height: 85vh;
      background-color: #f1f8e9;
      text-align: center;
    }

    .hero h1 {
      font-size: 42px;
      margin-bottom: 20px;
      color: #2e7d32;
    }

    .hero p {
      font-size: 18px;
      margin-bottom: 30px;
      color: #4e944f;
      max-width: 700px;
    }

    .hero a {
      background-color: #43a047;
      color: white;
      padding: 12px 25px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 25px;
      transition: background 0.3s;
    }

    .hero a:hover {
      background-color: #2e7d32;
    }

    footer {
      text-align: center;
      padding: 20px;
      color: #33691e;
      background-color: #dcedc8;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      nav {
        flex-direction: column;
        align-items: flex-start;
      }

      .nav-links {
        margin-top: 10px;
      }

      .hero {
        padding: 40px 20px;
      }
    }
  </style>
</head>
<body>

<nav>
  <div class="logo">PENYAKIT KULIT</div>
  <div class="nav-links">
    <a href="../index.php">Home</a>
    <a href="../penjelasan_penyakit.php">Penjelasan</a>
    <a href="#">Diagnosa</a>
    <a href="admin/login.php" style="border: 1px solid #00bcd4; border-radius: 20px; padding: 8px 15px;">Login Admin</a>
  </div>
</nav>

<section class="hero">
  <div class="hero-text">
    <h1>Sistem Pakar</h1>
    <p>Diagnosa Penyakit Kulit pada Manusia dengan Menggunakan Metode Naive Bayes</p>
    <a href="form_diagnosa.php">DIAGNOSA SEKARANG</a>
  </div>
</section>

<footer>
  &copy; <?= date('Y') ?>. All Rights Reserved.
</footer>

</body>
</html>
