<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$greska = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        $conn = new mysqli($db_host, $username, $password, $db_name);
        
        if ($conn->connect_error) {
            $greska = '❌ Neispravano korisničko ime ili lozinka!';
        } else {
            $conn->close();
            header('Location: unos.html');
            exit;
        }
    } catch (Exception $e) {
        $greska = '❌ Neispravano korisničko ime ili lozinka!';
    }
}
?>
<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <title>Prijava na bazu</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 450px;
            width: 100%;
            padding: 40px;
            text-align: center;
        }
        .icon {
            width: 80px;
            height: 80px;
            background: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .icon svg {
            width: 50px;
            height: 50px;
            fill: white;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 28px;
        }
        .subtitle {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 16px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
        }
        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }
        .greska {
            background-color: #fed7d7;
            color: #c53030;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #c53030;
            text-align: left;
        }
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            cursor: pointer;
            border: none;
            width: 100%;
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-primary:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.3);
        }
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
            width: auto;
            margin-top: 20px;
            display: inline-block;
        }
        .btn-outline:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
        .info-text {
            margin-top: 20px;
            font-size: 13px;
            color: #a0aec0;
        }
        .info-text code {
            background: #f8f9fa;
            padding: 3px 6px;
            border-radius: 5px;
            font-family: monospace;
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
        </div>
        <h2>🔐 Prijava na bazu</h2>
        <div class="subtitle">Unesite MySQL podatke za pristup</div>
        
        <?php if ($greska): ?>
            <div class="greska"><?php echo $greska; ?></div>
        <?php endif; ?>
        
        <form method="POST" autocomplete="off">
            <div class="form-group">
                <label for="username">👤 Korisničko ime (MySQL)</label>
                <input type="text" id="username" name="username" required placeholder="Unesite korisničko ime.">
            </div>
            
            <div class="form-group">
                <label for="password">🔒 Lozinka</label>
                <input type="password" id="password" name="password" required placeholder="Unesite lozinku">
            </div>
            
            <button type="submit" class="btn btn-primary">🔌 Spoji se na bazu</button>
        </form>
        
        <div style="margin-top: 10px;">
            <a href="index.php" class="btn btn-outline">← Povratak na početnu</a>
        </div>
    </div>
</body>
</html>
