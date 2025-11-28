<?php
// Load kelas BugPoisonPokemon HARUS sebelum session_start()
require_once __DIR__ . '/classes/BugPoisonPokemon.php';

session_start();

$pokemon = $_SESSION['pokemon'];
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trainType = $_POST['trainType'];
    $intensity = (int)$_POST['intensity'];


    $result = $pokemon->train($trainType, $intensity);
    $_SESSION['pokemon'] = $pokemon;

    $_SESSION['history'][] = [
        'trainType' => $trainType,
        'intensity' => $intensity,
        'oldLevel' => $result['oldLevel'],
        'newLevel' => $result['newLevel'],
        'oldHp' => $result['oldHp'],
        'newHp' => $result['newHp'],
        'time' => date('Y-m-d H:i:s')
    ];

    $message = "Latihan selesai! Level: {$result['oldLevel']} -> {$result['newLevel']}, HP: {$result['oldHp']} -> {$result['newHp']}. " . $pokemon->specialMove();
}
?>

<!DOCTYPE html>
<html>
<head><title>PokéCare - Latihan</title></head>
<body>
    <h1>Latihan PokéCare</h1>
    <form method="POST">
        <label>Jenis Latihan:</label>
        <select name="trainType">
            <option value="Attack">Attack</option>
            <option value="Defense">Defense</option>
            <option value="Speed">Speed</option>
        </select><br>
        <label>Intensitas (1-10):</label>
        <input type="number" name="intensity" min="1" max="10"><br>
        <button type="submit">Latih</button>
    </form>
    <p><?php echo $message; ?></p>
    <a href="index.php"><button>Kembali ke Beranda</button></a>
    <a href="history.php"><button>Riwayat Latihan</button></a>
</body>
</html>