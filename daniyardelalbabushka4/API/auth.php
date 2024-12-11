<?php session_start();
include_once './db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Получение данных из формы
    $formData = $_POST;
    //Поля, которые ожидаем от forData
    $fields = [
        'email',
        'password',
    ];
    
    $errors = [];
    //Проверка + очистка данных
    foreach ($formData as $key => $value){
        $formData[$key] = htmlspecialchars($value);
    }
    // Проверка на существование ключа + пустота значения
    foreach($fields as $idx => $field){
        //проверка на существование ключа
        if(array_key_exists($field, $formData)){
            // Проверка на пустоту значения
            if($formData[$field]){
                //если дошли сюда, выходим из цикла, чтобы ошибка не записалась
            continue;
        }
        
      }
      // Дописать проверку на пустоту значения
        $errors[$field][] = 'zapolni polya ishak';
    }
    //на свопадение пароля и имайл
    $email =$formData['email'];
    $user = $db->query("
SELECT id FROM users WHERE email='$email'
")->fetchAll();
if(empty($user)){
    $errors['email'][]='User not found';
} else {
//password
$password =$formData['password'];
    $checkUser = $db->query("
SELECT id FROM users WHERE email ='$email' AND password = '$password'
")->fetchAll();
if(empty($checkUser)){
    $errors['password'][]='Wrong password';

}
}
    // Проверка правильнсти вводы пароля
    if(empty($errors)){
        $email =$formData['email'];
        $password =$formData['password'];
        $hash = time();
        $token = base64_encode("hash=$hash&email = $email&password=$password");

        $db->query("
        UPDATE users SET api_token='$token'
        WHERE email = '$email' AND  password = '$password'
        ")->fetchAll();

        $_SESSION['token'] = $token;
        header("Location: ../profile.php");
    }
    //
    if (!empty($errors)){
        $_SESSION['auth-errors'] = $errors;
        header('Location: ../login.php');
    }
} else {
    echo 'Запрос неверный';
}
?>