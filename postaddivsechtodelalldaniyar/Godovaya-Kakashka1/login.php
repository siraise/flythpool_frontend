<?php session_start(); 

// Проверка аутентификации

include_once('api/db.php');

if (array_key_exists('token', $_SESSION)) {
    $token = $_SESSION['token'];
    $userId = $db->query("
        SELECT id FROM users WHERE api_token = '$token'
    ")->fetchAll();

    if (!empty($userId)) {
        header('Location: profile.php');
    }
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
    <link rel="stylesheet" href="styles/pages/login.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="icon" href="images/icon.png">
    <title>Новая Жизнь | Авторизация</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="glavn.php" class="header-link"><i class="fa fa-home"></i> На главную</a>
        </div>
    </header>
    <main>
        <section>
        <?php 
            function showError($field) {
                if (!array_key_exists('auth-errors', $_SESSION)) {
                    echo '';
                } else {
                    $listErrors = $_SESSION['auth-errors'];

                    if (array_key_exists($field, $listErrors)) {
                        $error = implode(',', $listErrors[$field]); 
        
                        echo "<span class='error'>$error</span>";
                    }
                }
            }
        ?>
            <form class="login-form" action="api/authUser.php" method="POST">
                <h1 class="login-form-title">Авторизация</h1>
                <label for="email">Email<?php showError('email');?></label>
                <input name='email' type="email" id="email" placeholder="example@mail.com">
                <label for="password">Пароль<?php showError('password');?></label>
                <input type="password" id="password" name="password">
                <button type="submit">Войти</button>
                <a href="register.php">Регистрация</a>
            </form>
        </section>
    </main>
</body>
</html>