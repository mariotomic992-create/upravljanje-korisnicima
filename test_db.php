<?php
echo "<h1>Test spajanja na bazu</h1>";

$host = 'localhost';
$user = 'mario';
$pass = 'cornet123';
$db = 'mojsajt_db';

echo "<p>Spajanje sa: $user / $pass na $host</p>";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    echo "<p style='color:red'>❌ Greška: " . $conn->connect_error . "</p>";
} else {
    echo "<p style='color:green'>✅ Uspješno spojen na bazu!</p>";
    $conn->close();
}
?>
