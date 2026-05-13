<?php
$host = 'localhost';
$user = 'mario';
$pass = 'cornet123';
$db = 'mojsajt_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Greška spajanja: " . $conn->connect_error);
}

// Provjeri da li je poslan ID za brisanje
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prvo provjeri da li korisnik postoji
    $check = $conn->query("SELECT ime FROM korisnici WHERE id = $id");
    
    if ($check->num_rows > 0) {
        $row = $check->fetch_assoc();
        $ime = $row['ime'];
        
        // Obriši korisnika
        $sql = "DELETE FROM korisnici WHERE id = $id";
        
        if ($conn->query($sql) === TRUE) {
            // Preusmjeri nazad na prikazi.php sa porukom
            header("Location: prikazi.php?poruka=obrisano&ime=" . urlencode($ime));
            exit;
        } else {
            header("Location: prikazi.php?poruka=greska");
            exit;
        }
    } else {
        header("Location: prikazi.php?poruka=ne_postoji");
        exit;
    }
} else {
    // Ako nema ID, vrati na prikaz
    header("Location: prikazi.php");
    exit;
}

$conn->close();
?>
