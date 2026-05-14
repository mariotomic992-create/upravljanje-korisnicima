<!DOCTYPE html>
<html lang="bs">
<head>
    <meta charset="UTF-8">
    <title>Linux</title>
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
            max-width: 600px;
            width: 100%;
            padding: 40px;
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
        
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-size: 32px;
            text-align: center;
        }
        
        .subtitle {
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 16px;
            text-align: center;
        }
        
        .info-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .info-card h2 {
            color: #2c3e50;
            font-size: 20px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e2e8f0;
            text-align: center;
        }
        
        /* Centriranje tabele sa podacima */
        .info-wrapper {
            display: flex;
            justify-content: center;
        }
        
        .info-table {
            display: table;
        }
        
        .info-row {
            display: table-row;
        }
        
        .info-label {
            display: table-cell;
            font-weight: 600;
            color: #667eea;
            font-size: 14px;
            padding: 8px 20px 8px 0;
            white-space: nowrap;
            text-align: left;
        }
        
        .info-value {
            display: table-cell;
            color: #2c3e50;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 0;
            text-align: left;
        }
        
        .status {
            color: #48bb78;
            font-weight: bold;
        }
        
        .status-error {
            color: #f56565;
            font-weight: bold;
        }
        
        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
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
        
        @media (max-width: 500px) {
            .info-label {
                white-space: normal;
                padding-right: 15px;
            }
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
        <h1>Dobrodošli u  bazu podataka</h1>
        <div class="subtitle">Server informacije i status</div>
        
        <div class="info-card">
            <h2>📊 Server informacije</h2>
            <div class="info-wrapper">
                <div class="info-table">
                    <div class="info-row">
                        <span class="info-label">🖥️ Hostname:</span>
                        <span class="info-value"><?php echo gethostname(); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">📅 Datum i vrijeme:</span>
                        <span class="info-value"><?php echo date('d.m.Y H:i:s'); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">🌐 Web server:</span>
                        <span class="info-value">Nginx</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">🐘 PHP status:</span>
                        <span class="info-value">

                            <?php 
                             date_default_timezone_set('Europe/Sarajevo');
                            if (function_exists('mysqli_connect')) {
                                echo '<span class="status">✅ MySQL podrška aktivna</span>';
                            } else {
                                echo '<span class="status-error">❌ MySQL podrška nije instalirana</span>';
                            }
                            ?>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">💻 OS:</span>
                        <span class="info-value"><?php echo php_uname('s'); ?> <?php echo php_uname('r'); ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">📁 PHP verzija:</span>
                        <span class="info-value"><?php echo phpversion(); ?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="buttons">
            <a href="login.php" class="btn btn-primary">👥 Spoji se na bazu korisnika</a>
           
        </div>
    </div>
</body>
</html>
