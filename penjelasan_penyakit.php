<?php
include 'db_connect.php';
$penyakit = $conn->query("SELECT * FROM penyakit");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penjelasan Penyakit Kulit</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #e8f5e9, #ffffff);
            margin: 0;
            padding: 0;
            color: #1b5e20;
        }

        .navbar {
            background-color: #2e7d32;
            padding: 15px 30px;
            color: white;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar a {
            color: white;
            text-decoration: underline;
            font-weight: bold;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #388e3c;
            margin-bottom: 30px;
        }

        .penyakit {
            margin-bottom: 40px;
            padding: 20px;
            border-left: 5px solid #66bb6a;
            background-color: #f1f8e9;
            border-radius: 6px;
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }

        .penyakit img {
            width: 180px;
            height: auto;
            border-radius: 8px;
            object-fit: contain;
            background-color: #fff;
            border: 1px solid #c8e6c9;
        }

        .penyakit-content {
            flex: 1;
        }

        .penyakit-content h3 {
            margin-top: 0;
            color: #2e7d32;
        }

        .penyakit-content p {
            margin-bottom: 10px;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .penyakit {
                flex-direction: column;
                align-items: center;
            }

            .penyakit img {
                width: 100%;
                max-width: 300px;
            }

            .penyakit-content {
                text-align: justify;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div><strong>🩺 Sistem Pakar Kulit</strong></div>
        <div><a href="index.php">Home</a></div>
    </div>

    <div class="container">
        <h2>Penjelasan Penyakit Kulit</h2>

        <?php while ($row = $penyakit->fetch_assoc()): ?>
            <div class="penyakit">
             <?php if (!empty($row['gambar']) && file_exists("assets/penyakit/" . $row['gambar'])): ?>
            <img src="assets/penyakit/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_penyakit']) ?>">
            <?php else: ?>
            <?php endif; ?>


                <div class="penyakit-content">
                    <h3><?= htmlspecialchars($row['nama_penyakit']) ?></h3>
                    <p><strong>Deskripsi:</strong><br><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
                    <p><strong>Solusi:</strong><br><?= nl2br(htmlspecialchars($row['solusi'])) ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
