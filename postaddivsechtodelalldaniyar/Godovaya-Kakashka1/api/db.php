<?php
// Подключение к базе данных 
$db = new PDO('mysql:host=localhost;dbname=new_life;charset=utf8mb4', 'root', null, [ 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
]);



?>