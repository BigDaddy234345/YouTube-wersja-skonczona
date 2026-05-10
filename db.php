<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'youtube_db';

// Łączymy się
$link = mysqli_connect($host, $user, $pass, $db);

// Sprawdzenie połączenia
if (!$link) {
    die("Błąd: baza danych nie jest połączona! " . mysqli_connect_error());
}
?>