<?php
require_once __DIR__ . '/classes/BugPoisonPokemon.php';

if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}
session_start();

if (!isset($_SESSION['pokemon'])) {
    $_SESSION['pokemon'] = new BugPoisonPokemon('Kakuna', 5, 100);
    $_SESSION['history'] = [];
}
$pokemon = $_SESSION['pokemon'];
?>

<!DOCTYPE html>
<html>
<head><title>PokéCare - Beranda</title></head>
<body>
    <h1>Informasi Dasar PokéCare</h1>
    <p>Nama: <?php echo $pokemon->getName(); ?></p>
    <p>Tipe: <?php echo $pokemon->getType(); ?> (Pengaruh: Fokus pada pertahanan / proteksi (shell/cangkang keras & racun))</p>
    <p>Level Awal: <?php echo $pokemon->getLevel(); ?></p>
    <p>HP Awal: <?php echo $pokemon->getHp(); ?></p>
    <p>Jurus Spesial: <?php echo $pokemon->getSpecialMove(); ?> (<?php echo $pokemon->specialMove(); ?>)</p>
    <a href="train.php"><button>Mulai Latihan</button></a>
    <a href="history.php"><button>Riwayat Latihan</button></a>
</body>
</html>