<?php session_start();
 include_once('API/db.php');
 if(array_key_exists('token',$_SESSION)){
    $token = $_SESSION['token'];
    $userId = $db->query("
    SELECT id,type FROM users WHERE api_token = '$token'
    ")->fetchAll();

    if(empty($userId)){
        unset($_SESSION['token']);
       header("Location: login.php");
    }
    else{
        $type= $userId[0]['type'];
        if($type != 'mod'){
            header('Location: glavn.php');
        }
    }
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет модератора</title>
    <link rel="stylesheet" href="moder.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="glavn.php">На Главную</a>
       
    </header>
    <main>
        <section class="filter">
                <div class="container">
                    <form>
                    <label for="date-form">От</label>
                    <input type="date" т name="date-form" id="date-form">
                    <label for="date-to">До</label>
                    <input type="date" name="date-to" id="date-to">
                    <select name="type" id="type">
                        <option value="0">Активно</option>
                        <option value="1">На модерации</option>
                        <option value="2">Найдено</option>
                        <option value="3">В архиве</option>
                    </select>
                    <button type="submit">Поиск</button>
                </form>
            </div>
        </section>
        <section class="items"> 
            <div class="container">
                <div class="ad-list"></div>
                    <div class="ad-item">
                        <img src="images/img/avatar.jpg" alt="">
                        <small>23.11.2022|Какой-то район</small>
                        <h3>Животное</h3>
                        <p>Животное агрессивное, пожалуйста да!</p>
                    </div>
                    <div class="ad-item">
                        <img src="images/img/avatar.jpg" alt="">
                        <small>23.11.2022|Какой-то район</small>
                        <h3>Животное</h3>
                        <p>Животное агрессивное, пожалуйста да!</p>
                    </div>
                    <div class="ad-item">
                        <img src="images/img/avatar.jpg" alt="">
                        <small>23.11.2022|Какой-то район</small>
                        <h3>Животное</h3>
                        <p>Животное агрессивное, пожалуйста да!</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>