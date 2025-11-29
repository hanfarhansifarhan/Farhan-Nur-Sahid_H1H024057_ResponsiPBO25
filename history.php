<?php
// Load kelas BugPoisonPokemon (jika menggunakan objek Pokémon)
require_once __DIR__ . '/classes/BugPoisonPokemon.php';

session_start();
$history = $_SESSION['history'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PokéCare - Riwayat Latihan</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .pokemon-image {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }
        .history-list {
            list-style: none;
            padding: 0;
        }
        .history-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }
        .back-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Latihan PokéCare</h1>
        
        <!-- Gambar Kakuna -->
        <img src="https://www.giantbomb.com/a/uploads/original/1/17172/1321109-kakuna_by_rikkoshaye.jpg" 
             alt="Kakuna" 
             class="pokemon-image"
             onerror="this.src='https://via.placeholder.com/150?text=Gambar+Tidak+Tersedia'">
        
        <ul class="history-list">
            <?php foreach ($history as $session): ?>
                <li class="history-item">
                    <strong>Jenis:</strong> <?php echo $session['trainType']; ?>, 
                    <strong>Intensitas:</strong> <?php echo $session['intensity']; ?><br>
                    <strong>Level:</strong> <?php echo $session['oldLevel']; ?> → <?php echo $session['newLevel']; ?><br>
                    <strong>HP:</strong> <?php echo $session['oldHp']; ?> → <?php echo $session['newHp']; ?><br>
                    <strong>Waktu:</strong> <?php echo $session['time']; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if (empty($history)): ?>
            <p>Belum ada riwayat latihan.</p>
        <?php endif; ?>

        <a href="index.php"><button class="back-button">Kembali ke Beranda</button></a>
    </div>
</body>
</html>