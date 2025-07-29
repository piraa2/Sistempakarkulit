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
      background-color: #e8f5e9;
      color: #1b5e20;
    }

    nav {
      background-color: #2e7d32;
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

    /* === SLIDER === */
    .slider {
      width: 150%;
      max-height: 300px;
      overflow: hidden;
      position: relative;
      margin-bottom: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f5f5f5;
    }

    .slides {
      display: flex;
      width: 50%; /* hanya 2 gambar */
      animation: slideAnimation 20s infinite;
    }

    .slides img {
      width: 50%;
      height: auto;
      object-fit: contain;
      background-color: #f5f5f5;
    }

    @keyframes slideAnimation {
      0%   { transform: translateX(0); }
      50%  { transform: translateX(-100%); }
      100% { transform: translateX(0); }
    }

    .hero {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 60px;
      min-height: 85vh;
      background-color: #f1f8e9;
      gap: 50px;
    }

    .hero-left {
      flex: 1;
    }

    .hero-left h2 {
      text-align: center;
      font-size: 28px;
      color: white;
      background-color: #2e7d32;
      padding: 10px 25px;
      border-radius: 20px;
      display: inline-block;
      font-weight: bold;
    }

    .hero-left p {
      font-size: 16px;
      line-height: 1.7;
      color: white;
      text-align: center; 
      margin: 50px; 
      background-color:rgb(74, 216, 81);  
      border-radius: 10px;
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
        flex-direction: column;
        padding: 40px 20px;
      }

      /* .slides img {
        height: auto;
      } */
    }

    #slider::-webkit-slider-runable-track {
      height: 5px;
      background: #dcedc8;
      border-radius: 4px;
    }

    #slider::-webkit-slider-thumb {
      height: 20px;
      width: 20px;
      background: #dcedc8;
      border-radius: 50%;
      margin-top: -6px;
      cursor: pointer;
      border: none;
    }
  </style>
</head>
<body>

<!-- Navigation -->
<nav>
  <div class="logo">PENYAKIT KULIT</div>
  <div class="nav-links">
    <a href="index.php">Home</a>
    <a href="penjelasan_penyakit.php">Penjelasan</a>
    <a href="user/form_diagnosa.php">Diagnosa</a>
    <a href="admin/login.php" style="border: 1px solid #00bcd4; border-radius: 20px; padding: 8px 15px;">Login Admin</a>
  </div>
</nav>

<!-- Slider 2 Gambar -->
<div class="slider">
  <div class="slides">
    <img src="assets/slider1.jpg" alt="Slide 1">
    <img src="assets/slider2.jpg" alt="Slide 2">
    <img src="assets/slider3.jpg" alt="Slide 3">
    <img src="assets/slider4.jpg" alt="Slide 4">
  </div>
</div>

<!-- Hero Section -->
<!-- Hero Section -->
<section class="hero">
  <div class="hero-left" style="text-align: center">
    <h2 style="text-align: center;">Apa itu Kulit?</h2>
    <p style="text-align: center;">
      Kulit adalah organ terbesar dalam tubuh manusia yang berfungsi sebagai pelindung utama dari lingkungan luar. 
      Kulit memiliki berbagai lapisan yang menjaga tubuh dari kuman, bakteri, sinar UV, serta membantu mengatur suhu tubuh. 
      Kulit juga memungkinkan tubuh untuk merasakan sentuhan dan tekanan melalui sistem saraf. 
      Kesehatan kulit penting untuk dipertahankan karena merupakan pertahanan pertama tubuh terhadap infeksi dan cedera.
    </p> 

    <h2 style="text-align: center;">Apa itu Penyakit Kulit?</h2>
    <p style="text-align: center;">
      Penyakit kulit merupakan gangguan atau kelainan yang terjadi pada jaringan kulit manusia, baik yang bersifat ringan maupun kronis. 
      Jenisnya sangat beragam, mulai dari infeksi jamur seperti panu dan kurap, hingga kondisi autoimun seperti psoriasis atau infeksi virus seperti cacar. 
      Penyakit kulit dapat disebabkan oleh berbagai faktor, termasuk infeksi bakteri, virus, jamur, reaksi alergi, paparan bahan kimia, hingga faktor genetik.
    </p>

    <h2 style="text-align: center;">Bagaimana Cara Menjaga Kesehatan Kulit?</h2>
    <p style="text-align: center;">
      Kulit yang sehat dapat dicapai dengan membersihkan wajah secara teratur, menggunakan pelembap, tabir surya, makan makanan bergizi, minum air putih cukup, dan mengelola stres.
      Hindari kebiasaan buruk seperti menyentuh wajah dengan tangan kotor dan memakai produk yang tidak cocok.
    </p><br><br>

    <h2 style="text-align: center;">Kenapa Harus Menjaga Kesehatan Kulit?</h2>
    <p style="text-align: center;">
      Menjaga kesehatan kulit penting karena kulit adalah pertahanan utama terhadap berbagai ancaman eksternal. 
      Kulit sehat membantu mencegah infeksi, iritasi, serta mencerminkan kondisi kesehatan tubuh secara keseluruhan.
    </p>
  </div>
</section>

<!-- Footer -->
<footer>
  &copy; <?= date('Y') ?> Sistem Pakar Penyakit Kulit. All Rights Reserved.
</footer>

</body>
</html>
