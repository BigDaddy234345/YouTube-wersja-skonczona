<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'youtube_db';

// Подключаемся
$link = mysqli_connect($host, $user, $pass, $db);

// Проверка связи
if (!$link) {
    die("Ошибка: база не на связи! " . mysqli_connect_error());
}
?>