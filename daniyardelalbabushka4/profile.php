<?php session_start();
 include_once('API/db.php');
 if(array_key_exists('token',$_SESSION)){
    $token = $_SESSION['token'];
    $userId = $db->query("
    SELECT id FROM users WHERE api_token = '$token'
    ")->fetchAll();
    if(empty($userId)){
        unset($_SESSION['token']);
       header("Location: login.php");
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
    <title>Профиль</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="glavn.php">На главную</a>
        </div>
    </header>
    <main>
        <section class="info">
            <div class="container">
                <div class="info_item">
                    <img src="images\img\images.jpg" alt="">
                </div>
                <div class="info_item">
               <ul>
                <li>Номер телефона: 8923 4554 40  50</li>
                <li>Email:example@gmail.com</li>
                <li>кол-во объявлениф:10</li>
                <li>Кол-во вернувшийхся животных:0</li>
                <li>Регистрация:11.11.2024</li>
               </ul>
                </div>
            </div>
        </section>
        <section class="hero">
            <div class="container">
                <h2>Объявления</h2>
                <select name="type" id="type">
                    <option value="0">Активно</option>
                    <option value="1">На модерации</option>
                    <option value="2">Найдено</option>
                    <option value="3">В архиве</option>
                </select>
                <div class="ad-list">
                    <div class="ad-item">
                        <img src="images/img/sab.jpg" alt="">
                        <small>23.11.2022|Карасукский район</small>
                        <h3>Сабака</h3>
                        <p>Памагите найти жавотное!</p>
                    </div>
                    <div class="ad-item">
                        <img src="images/img/sab.webp" alt="">
                        <small>23.11.2022|Карасукский район</small>
                        <h3>Псина</h3>
                        <p>Памагите найти жавотное!</p>
                    </div>
                    <div class="ad-item">
                        <img src="images/img/sab.jpg" alt="">
                        <small>23.11.2022|Карасукский район</small>
                        <h3>Пес</h3>
                        <p>Памагите найти жавотное!</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>