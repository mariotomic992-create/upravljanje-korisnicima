<?php
date_default_timezone_set('Europe/Sarajevo');
echo "PHP vrijeme: " . date('Y-m-d H:i:s') . "<br>";
echo "PHP vremenska zona: " . date_default_timezone_get() . "<br><br>";

// Spajanje na bazu sa provjerom greške
$conn = new mysqli('localhost', 'mario', 'cornet123', 'mojsajt_db');

if ($conn->connect_error) {
    die("Greška spajanja na bazu: " . $conn->connect_error);
}

// MySQL trenutno vrijeme
$result = $conn->query("SELECT NOW() as mysql_time");
$row = $result->fetch_assoc();
echo "MySQL trenutno vrijeme: " . $row['mysql_time'] . "<br><br>";

// Prikaz zadnjih 5 unosa
echo "<h3>Zadnjih 5 korisnika:</h3>";
$result = $conn->query("SELECT id, ime, datum_unosa FROM korisnici ORDER BY id DESC LIMIT 5");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Ime: " . $row['ime'] . " - Datum: " . $row['datum_unosa'] . "<br>";
    }
} else {
    echo "Nema korisnika u bazi.";
}

$conn->close();
?>
