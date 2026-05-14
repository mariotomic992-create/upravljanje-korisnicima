	<!DOCTYPE html>
<html lang="bs">
<head>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'> 📊</text></svg>">
    <meta charset="UTF-8">
    <title>Unos korisnika</title>
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
            max-width: 500px;
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
        
        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
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
        }
        
        .btn-primary {
            background: #667eea;
            color: white;
        }
        
        .btn-primary:hover {
            background: #5a67d8;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.3);
            cursor: pointer;
        }
        
        .btn-secondary {
            background: #48bb78;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #38a169;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(72,187,120,0.3);
            cursor: pointer;
        }
        
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }
        
        .btn-outline:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </div>
        <h2>📝 Unos novog korisnika</h2>
        <div class="subtitle">Popunite podatke za unos u bazu</div>
        
        <form action="spremi.php" method="POST">
            <div class="form-group">
                <label for="ime">👤 Ime i prezime</label>
                <input type="text" id="ime" name="ime" required placeholder="Unesite ime i prezime">
            </div>
            
            <div class="form-group">
                <label for="email">📧 Email adresa</label>
                <input type="email" id="email" name="email" required placeholder="example@mail.com">
            </div>
            <div class="form-group">
                <label for="odjel">🏢 Odjel </label>
                <input type="text" id="odjel" name="odjel" required placeholder="npr. IT, Računovodstvo, Marketing...">
                </div>
 
           <div class="form-group">
    <label>📅 Datum zaposlenja (dan.mjesec.godina)</label>
    <div style="display: flex; gap: 10px;">
        <select id="dan" name="dan" required style="flex:1; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            <option value="">Dan</option>
            <?php for($i=1;$i<=31;$i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
        <select id="mjesec" name="mjesec" required style="flex:1; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            <option value="">Mjesec</option>
            <?php for($i=1;$i<=12;$i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
        
        <select name="godina" required style="flex:1; padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
    <option value="">Godina</option>
    <?php for($i=1970; $i<=2030; $i++): ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    <?php endfor; ?>
</select>
    </div>
</div>
              
            <div class="buttons">
                <button type="submit" class="btn btn-primary">💾 Spremi u bazu</button>
                <a href="prikazi.php" class="btn btn-secondary">📋 Prikaži sve korisnike</a>
            </div>
        </form>
        
        <div style="margin-top: 25px;">
            <a href="index.php" class="btn btn-outline">← Povratak na početnu</a>
        </div>
    </div>
</body>
</html>
