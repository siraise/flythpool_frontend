<?php session_start();
include_once './db.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET' &&
array_key_exists('token',$_SESSION)
) {
    $token = $_SESSION['token'];
    $db->query("
        UPDATE users SET api_token = NULL
        WHERE api_token = '$token'
        ")->fetchAll();
//DDelet token in session
unset($_SESSION['token']);
header("Location ../daniyar delal babushka 2/glavn.php");
}else{
    header("Location ../daniyar delal babushka 2/glavn.php");
}
?>