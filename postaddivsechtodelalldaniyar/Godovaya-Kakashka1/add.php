<?php session_start(); 

// Проверка аутентификации

include_once('api/db.php');

if (array_key_exists('token', $_SESSION)) {
    $token = $_SESSION['token'];
    $userId = $db->query("
        SELECT id FROM users WHERE api_token = '$token'
    ")->fetchAll();

    if (empty($userId)) {
        unset($_SESSION['token']);
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font awesome -->
         <link rel="stylesheet" href="modules/css/font-awesome.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="styles/pages/add.css">
        <link rel="stylesheet" href="styles/settings.css">
        <link rel="icon" href="images/icon.png">
        <title>Новая Жизнь | Новое объявление</title>
    </head>
<body>
    
    <header class="header">
        <div class="container">
            <a href="glavn.php" class="header-link"><i class="fa fa-home"></i> На главную</a>
        </div>
    </header>

<main>
    <section class="add">
        <div class="container">
            <form method="POST" action="api/addPost.php">
                <select name="type" id="type">
                    <option value="cat">Кот</option>
                    <option value="dog">Собака</option>
                </select>

                <label for="desc">Доп. инфа</label>
                <textarea name="desc" id="desc"></textarea>

                <label for="mark">Клеймо (если есть)</label>
                <input type="text" name="mark" id="mark">

                <select name="address" id="place">
                    <option value="Karasuk">Карасук</option>
                    <option value="center">Центр</option>
                </select>
                <label for="date">Дата</label>
                <input type="date" name="date" id="date">
                <button type = "submit">Добавить</button>
            </form>
        </div>
    </section>
</main>
</body>
</html>