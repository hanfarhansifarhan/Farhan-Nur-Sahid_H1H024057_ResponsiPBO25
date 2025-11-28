<?php
require_once __DIR__ . '/classes/BugPoisonPokemon.php';

session_start();
$history = $_SESSION['history'] ?? [];
?>

<!DOCTYPE html>
<html>
<head><title>PokéCare - Riwayat Latihan</title></head>
<body>
    <h1>Riwayat Latihan PokéCare</h1>
    <ul>
        <?php foreach ($history as $session): ?>
            <li>
                Jenis: <?php echo $session['trainType']; ?>, Intensitas: <?php echo $session['intensity']; ?><br>
                Level: <?php echo $session['oldLevel']; ?> -> <?php echo $session['newLevel']; ?><br>
                HP: <?php echo $session['oldHp']; ?> -> <?php echo $session['newHp']; ?><br>
                Waktu: <?php echo $session['time']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php"><button>Kembali ke Beranda</button></a>
</body>
</html>