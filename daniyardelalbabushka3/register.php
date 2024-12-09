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
    <title>new life/registrerer</title>
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
            if(!array_key_exists('register-errors',$_SESSION)){
            echo'';
            } else {
             $listErrors = $_SESSION['register-errors'];

            if(array_key_exists($field,$listErrors))
             {$error = implode(',', $listErrors[$field]);

               echo "<span class='error'> $error </span>";
            }
            }
        }
        
        ?>
        <section>
            <form method="POST" action="API/registrationUser.php">
                    <h1 class="register-form-title">Регистрация</h1>
                    <label for="email">Email<?php showError('email');?></label>
                    <input require name="email" type="email" id="email" placeholder="example@mail.com">
                    <label for="name">Имя<?php showError('name');?></label>
                    <input name="name" type="text" id="name" placeholder="Имя">
                    <label for="surname">Фамилия<?php showError('surname');?></label>
                    <input name="surname" type="text" id="surname" placeholder="Фамилия">
                    <label for="phone">Телефон<?php showError('phone');?></label>
                    <input name="phone" type="tel" id="phone" placeholder="Телефон">
                    <label for="password">Пароль<?php showError('password');?></label>
                    <input name="password" type="password" id="password" name="password">
                    <label for="password-confirm">Подтверждение пароля<?php showError('password-confirm');?></label>
                    <input name="password-confirm" type="password" id="password-confirm" name="password-confirm">
                    <div class="checkbox-wrapper">
                        <label for="agree">Согласие на обработку персональных данных<?php showError('agree');?></label>
                        <input type="checkbox" id="agree" name="agree">
                    </div>
                    <button type="submit">Регистрация</button>
                    <a href="login.php">Авторизация</a>
            </form>
        </section>
    </main>
    
</body>
</html>