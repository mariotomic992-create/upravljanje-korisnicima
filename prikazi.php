<?php
date_default_timezone_set('GMT+2');

include 'config.php';
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("Greška spajanja na bazu: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM korisnici ORDER BY datum_unosa DESC");

?>
<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <title>Popis korisnika</title>
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
            padding: 40px 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header .icon {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        
        .header .icon svg {
            width: 35px;
            height: 35px;
            fill: white;
        }
        
        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .header p {
            font-size: 16px;
            opacity: 0.9;
        }
        
        .content {
            padding: 30px;
        }
        
        .poruka {
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .poruka-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .poruka-error {
            background-color: #fed7d7;
            color: #c53030;
            border: 1px solid #f5c6cb;
        }
        
        .stats {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .stats .count {
            font-size: 18px;
            color: #2c3e50;
        }
        
        .stats .count span {
            font-weight: bold;
            color: #667eea;
            font-size: 24px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a67d8;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: #48bb78;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #38a169;
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background: #f56565;
            color: white;
            padding: 6px 12px;
            font-size: 13px;
        }
        
        .btn-danger:hover {
            background: #e53e3e;
            transform: translateY(-2px);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: #f8f9fa;
            color: #2c3e50;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #e2e8f0;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
            color: #4a5568;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .empty {
            text-align: center;
            padding: 60px;
            color: #a0aec0;
            font-size: 18px;
        }
        
        .back-link {
            text-align: center;
            margin-top: 25px;
        }
        
        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }
            
            table {
                font-size: 14px;
            }
            
            th, td {
                padding: 8px 10px;
            }
            
            .stats {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6h16v2H4V6zm2-4h12v2H6V2zm16 8H2v12h20V10zm-2 10H4v-8h16v8z"/>
                </svg>
            </div>
            <h1>📋 Popis korisnika</h1>
            <p>Svi korisnici spremljeni u bazu podataka</p>
        </div>
        <div class="content">
            
            <?php
            // Prikaz poruke o brisanju (ako postoji)
            if (isset($_GET['poruka'])) {
                if ($_GET['poruka'] == 'obrisano') {
                    $ime = isset($_GET['ime']) ? htmlspecialchars($_GET['ime']) : '';
                    echo '<div class="poruka poruka-success">✅ Uspješno obrisan korisnik: <strong>' . $ime . '</strong></div>';
                } elseif ($_GET['poruka'] == 'greska') {
                    echo '<div class="poruka poruka-error">❌ Greška pri brisanju!</div>';
                } elseif ($_GET['poruka'] == 'ne_postoji') {
                    echo '<div class="poruka poruka-error">❌ Korisnik ne postoji!</div>';
                }
            }
            ?>
            
            <?php if ($result->num_rows > 0): ?>
                <div class="stats">
                    <div class="count">
                        📊 Ukupno korisnika: <span><?php echo $result->num_rows; ?></span>
                    </div>
                    <a href="unos.html" class="btn btn-primary">➕ Unesi novog korisnika</a>
                </div>
                
                <div style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ime i prezime</th>
                                <th>Email adresa</th>
                                <th>Odjel </th>
                                <th>Datum zaposlenja</th>
                                <th>Datum unosa</th>
                                <th>Akcija</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['ime']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['odjel']); ?></td>
                                <td><?php echo date('d.m.Y', strtotime($row['datum_zaposlenja'])); ?></td>
                                <td><?php echo date('d.m.Y H:i:s', strtotime($row['datum_unosa'])); ?></td>
                                 
                                <td>
                                    <a href="brisanje.php?id=<?php echo $row['id']; ?>" 
                                       class="btn btn-danger" 
                                       onclick="return confirm('Obrisati korisnika <?php echo htmlspecialchars($row['ime']); ?>?')">
                                        🗑️ Obriši
                                    </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="empty">
                    📭 Trenutno nema korisnika u bazi.<br><br>
                    <a href="unos.html" class="btn btn-primary">➕ Unesi prvog korisnika</a>
                </div>
            <?php endif; ?>
            
            <div class="back-link">
                <a href="index.php">← Povratak na početnu stranicu</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
