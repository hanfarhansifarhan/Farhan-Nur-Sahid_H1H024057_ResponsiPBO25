<?php
// Load kelas BugPoisonPokemon HARUS sebelum session_start()
require_once __DIR__ . '/classes/BugPoisonPokemon.php';

session_start();

$pokemon = $_SESSION['pokemon'];
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trainType = $_POST['trainType'];
    $intensity = (int)$_POST['intensity'];

    // Simulasi latihan (memanggil method OOP)
    $result = $pokemon->train($trainType, $intensity);
    $_SESSION['pokemon'] = $pokemon;

    // Simpan riwayat
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
<head>
    <title>PokéCare - Latihan</title>
    <style>
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .pokemon-image {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto 20px;
        }
        form {
            margin: 20px 0;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        select, input {
            padding: 8px;
            margin-bottom: 15px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .message {
            padding: 10px;
            background-color: #e8f5e8;
            border-left: 4px solid #4CAF50;
            margin: 20px 0;
        }
        .nav-buttons {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Latihan PokéCare</h1>
        
        <!-- Gambar Kakuna -->
        <img src="https://www.giantbomb.com/a/uploads/original/1/17172/1321109-kakuna_by_rikkoshaye.jpg" 
             alt="Kakuna" 
             class="pokemon-image"
             onerror="this.src='https://via.placeholder.com/150?text=Gambar+Tidak+Tersedia'">
        
        <form method="POST">
            <label>Jenis Latihan:</label>
            <select name="trainType">
                <option value="Attack">Attack</option>
                <option value="Defense">Defense</option>
                <option value="Speed">Speed</option>
            </select>
            
            <label>Intensitas (1-10):</label>
            <input type="number" name="intensity" min="1" max="10" required>
            
            <button type="submit">Latih</button>
        </form>

        <?php if (!empty($message)): ?>
            <div class="message">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="nav-buttons">
            <a href="index.php"><button>Kembali ke Beranda</button></a>
            <a href="history.php"><button>Riwayat Latihan</button></a>
        </div>
    </div>
</body>
</html>