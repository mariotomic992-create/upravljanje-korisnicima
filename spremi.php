<?php
include 'config.php';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Greška spajanja: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ime = $_POST['ime'];
    $email = $_POST['email'];
    $odjel = $_POST['odjel'];
    $dan = $_POST['dan'];
    $mjesec = $_POST['mjesec'];
    $godina = $_POST['godina'];
    $datum_zaposlenja = "$godina-$mjesec-$dan";
    
    $sql = "INSERT INTO korisnici (ime, email, odjel, datum_zaposlenja) VALUES ('$ime', '$email', '$odjel', '$datum_zaposlenja')";
    
    echo "<!DOCTYPE html>
    <html lang='bs'>
    <head>
        <meta charset='UTF-8'>
        <title>Rezultat unosa</title>
        <link rel='icon' href=\"data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏆</text></svg>\">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
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
                max-width: 550px;
                width: 100%;
                padding: 40px;
                text-align: center;
            }
            
            .icon {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 20px;
            }
            
            .success-icon {
                background: #48bb78;
            }
            
            .error-icon {
                background: #f56565;
            }
            
            .icon svg {
                width: 50px;
                height: 50px;
                fill: white;
            }
            
            h2 {
                color: #2c3e50;
                margin-bottom: 20px;
                font-size: 28px;
            }
            
            .user-info {
                background: #f8f9fa;
                border-radius: 12px;
                padding: 20px;
                margin-bottom: 30px;
                text-align: left;
            }
            
            .user-info p {
                margin: 10px 0;
                font-size: 16px;
                color: #2c3e50;
            }
            
            .user-info strong {
                color: #667eea;
                font-weight: 600;
            }
            
            .buttons {
                display: flex;
                gap: 15px;
                justify-content: center;
                flex-wrap: wrap;
                margin-bottom: 15px;
            }
            
            .btn {
                padding: 12px 24px;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.3s ease;
                display: inline-block;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                font-size: 14px;
                cursor: pointer;
                border: none;
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
            
            .btn-secondary {
                background: #48bb78;
                color: white;
            }
            
            .btn-secondary:hover {
                background: #38a169;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(72,187,120,0.3);
            }
            
            .btn-home {
                background: #667eea;
                color: white;
            }
            
            .btn-home:hover {
                background: #5a67d8;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(102,126,234,0.3);
            }
            
            .error-text {
                color: #f56565;
                margin-top: 15px;
            }
        </style>
    </head>
    <body>";
    
    if ($conn->query($sql) === TRUE) {
        echo "
        <div class='container'>
            <div class='icon success-icon'>
                <svg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
                    <path d='M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z'/>
                </svg>
            </div>
            <h2>✅ Uspješno spremljeno!</h2>
            <div class='user-info'>
                <p><strong>👤 Ime i prezime:</strong> " . htmlspecialchars($ime) . "</p>
                <p><strong>📧 Email adresa:</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>🏢 Odjel:</strong> " . htmlspecialchars($odjel) . "</p>
                <p><strong>📅 Datum zaposlenja:</strong> " . date('d.m.Y', strtotime($datum_zaposlenja)) . "</p>
            </div>
            <div class='buttons'>
                <a href='unos.html' class='btn btn-primary'>📝 Unesi novog korisnika</a>
                <a href='prikazi.php' class='btn btn-secondary'>📋 Prikaži sve korisnike</a>
            </div>
            <div class='buttons'>
                <a href='index.php' class='btn btn-home'>🏠 Povratak na početnu</a>
            </div>
        </div>";
    } else {
        echo "
        <div class='container'>
            <div class='icon error-icon'>
                <svg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'>
                    <path d='M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z'/>
                </svg>
            </div>
            <h2>❌ Greška pri spremanju</h2>
            <div class='user-info'>
                <p class='error-text'>" . $conn->error . "</p>
            </div>
            <div class='buttons'>
                <a href='unos.html' class='btn btn-primary'>← Pokušaj ponovo</a>
                <a href='index.php' class='btn btn-home'>🏠 Povratak na početnu</a>
            </div>
        </div>";
    }
    
    echo "</body></html>";
} else {
    header("Location: unos.html");
    exit;
}

$conn->close();
?>
