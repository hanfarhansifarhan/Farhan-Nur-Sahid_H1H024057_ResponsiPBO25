<?php
// Load kelas BugPoisonPokemon HARUS sebelum session_start()
require_once __DIR__ . '/classes/BugPoisonPokemon.php';

// Hapus session lama jika ada dan start baru
if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
session_start();

// Inisialisasi Pokémon jika belum ada
if (!isset($_SESSION['pokemon'])) {
    $_SESSION['pokemon'] = new BugPoisonPokemon('Kakuna', 5, 100);
    $_SESSION['history'] = [];
}
$pokemon = $_SESSION['pokemon'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PokéCare - Beranda</title>
    <style>
        .pokemon-card {
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
            max-width: 500px;
            text-align: center;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .pokemon-image {
            max-width: 200px;
            height: auto;
            margin-bottom: 15px;
        }
        .pokemon-info {
            text-align: left;
            margin: 10px 0;
        }
        .nav-buttons {
            margin-top: 20px;
        }
        .nav-buttons button {
            padding: 10px 20px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .nav-buttons button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="pokemon-card">
        <h1>Informasi Dasar PokéCare</h1>
        
        <!-- Gambar Kakuna -->
        <img src="https://www.giantbomb.com/a/uploads/original/1/17172/1321109-kakuna_by_rikkoshaye.jpg" 
             alt="Kakuna" 
             class="pokemon-image"
             onerror="this.src='https://via.placeholder.com/200?text=Gambar+Tidak+Tersedia'">
        
        <div class="pokemon-info">
            <p><strong>Nama:</strong> <?php echo $pokemon->getName(); ?></p>
            <p><strong>Tipe:</strong> <?php echo $pokemon->getType(); ?> (Pengaruh: Fokus pada pertahanan / proteksi (shell/cangkang keras & racun))</p>
            <p><strong>Level Awal:</strong> <?php echo $pokemon->getLevel(); ?></p>
            <p><strong>HP Awal:</strong> <?php echo $pokemon->getHp(); ?></p>
            <p><strong>Jurus Spesial:</strong> <?php echo $pokemon->getSpecialMove(); ?> (<?php echo $pokemon->specialMove(); ?>)</p>
        </div>
        
        <div class="nav-buttons">
            <a href="train.php"><button>Mulai Latihan</button></a>
            <a href="history.php"><button>Riwayat Latihan</button></a>
        </div>
    </div>
</body>
</html>