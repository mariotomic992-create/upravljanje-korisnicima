<?php
$greska = "";

// Provjeri da li je forma poslana (TEK TADA pokušavamo spojiti)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Pokušaj spojiti
    $conn = @new mysqli('localhost', $username, $password, 'mojsajt_db');
    
    if ($conn->connect_error) {
        $greska = "❌ Neispravan username ili password! Pokušajte ponovo.";
    } else {
        // Uspješno spojeno
        $conn->close();
        header("Location: unos.html");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prijava na bazu</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f0f0f0; }
        .forma { background-color: white; padding: 20px; border-radius: 10px; max-width: 400px; margin: auto; }
        input { width: 100%; padding: 8px; margin: 5px 0 15px 0; border-radius: 5px; border: 1px solid #ccc; }
        button { background-color: #2c3e50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .greska { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; }
        .link { margin-top: 20px; text-align: center; }
    </style>
</head>
<body>
    <div class="forma">
        <h2>🔐 Prijava na bazu</h2>
        
        <?php if ($greska): ?>
            <div class="greska"><?php echo $greska; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <label for="username">👤 Korisničko ime (MySQL):</label>
            <input type="text" id="username" name="username" required placeholder="mario">
            
            <label for="password">🔒 Lozinka:</label>
            <input type="password" id="password" name="password" required placeholder="cornet123">
            
            <button type="submit">🔌 Spoji se na bazu</button>
        </form>
        
        <div class="link">
            <a href="index.php">← Povratak na početnu</a>
        </div>
    </div>
</body>
</html>
