<?php
$conn = new mysqli('localhost', 'mario', 'cornet123', 'mojsajt_db');

if ($conn->connect_error) {
    echo "Greška: " . $conn->connect_error;
} else {
    echo "Uspješno spojeno!";
    $conn->close();
}
?>
