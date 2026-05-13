<?php
$conn = new mysqli('localhost', 'mario', 'cornet123', 'mojsajt_db');

if ($conn->connect_error) {
    die("Greška pri spajanju: " . $conn->connect_error);
}

echo "<h2>Zadnjih 5 posjeta</h2>";
echo "<ul>";

$result = $conn->query("SELECT * FROM posjete ORDER BY vrijeme DESC LIMIT 5");

while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['vrijeme'] . " - IP: " . $row['ip'] . "</li>";
}

echo "</ul>";
$conn->close();
?>
