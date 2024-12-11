<?php session_start();
 include_once('API/db.php');
 if(array_key_exists('token',$_SESSION)){
    $token = $_SESSION['token'];
    $userId = $db->query("
    SELECT id FROM users WHERE api_token = '$token'
    ")->fetchAll();
    if(!empty($userId)){
       header("Location: profile.php");
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
        <div  class="container">
            <a href="glavn.php">На главную</a>
        </div>

    </header>
    <main>
        <?php 
        function showError($field){
            if(!array_key_exists('auth-errors',$_SESSION)){
            echo'';
            } else {
             $listErrors = $_SESSION['auth-errors'];

            if(array_key_exists($field,$listErrors))
             {$error = implode(',', $listErrors[$field]);

               echo "<span class='error'> $error </span>";
            }
            }
        }
        
        ?>
        <section>
            <form method="POST" action="API/auth.php">
                    <h1 class="register-form-title">Авторизация</h1>
                    <label for="email">Email<?php showError('email');?></label>
                    <input name="email" type="email" id="email" placeholder="example@mail.com">
                    <label for="password">Пароль<?php showError('password');?></label>
                    <input name="password" type="password" id="password" name="password">
                    <button type="submit">Войти</button>
                    <a href="register.php">Регистрация</a>
            </form>
        </section>
    </main>
    
</body>
</html>