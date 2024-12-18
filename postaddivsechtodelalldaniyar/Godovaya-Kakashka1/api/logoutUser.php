<?php session_start(); 

include_once './db.php';

if(
    $_SERVER['REQUEST_METHOD'] == 'GET' && 
array_key_exists('token', $_SESSION)
){
    $token = $_SESSION['token'];
    $db->query("
        UPDATE users SET api_token= NULL 
        WHERE api_token='$token'
")->fetchAll();
    // Удаляет токен из сессии
    unset($_SESSION['token']);
    header('Location: ../glavn.php');

} else {
    header('Location: ../glavn.php');
}
?>