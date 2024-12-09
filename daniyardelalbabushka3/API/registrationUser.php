<?php session_start();
include_once './db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
$formData = $_POST;
$fields =[
    'name',
    'surname',
     'email',
     'phone',
     'password',
     'password-confirm',
     'agree'
];
 $errors = [];
//  Проверака и очитска данных
foreach($formData as $key => $value){
    $formData[$key]= htmlspecialchars($value);
}
// проверка на существованием ключа и Проверка на пустоту
foreach($fields as $idx => $field){
    // Проверка существования ключа
if(array_key_exists($field,$formData)){
    // проверка пустоты занчеия
   if($formData[$field]){
    // если дошли до сюда выходим из цикла что бы ошибка не записалась
    continue;
}
}
//дописать проверку на пустоту значения
$errors[$field][]= 'Zapolni gnida';
}
///проверка правильности пароля
if($formData['password'] !== $formData['password-confirm'])
{
    $errors['password-confirm'][] = 'porol ne sovpadaet';
}
// проерка уникальности
$phone = $formData['phone'];
$email = $formData['email'];
$user = $db->query("
SELECT phone,email FROM users WHERE phone='$phone' OR email='$email'")->fetchAll();
if(!empty($user)){
    if($user[0]['phone'] ==$phone){
    $errors['phone'][]='takoy polzovatel est';
}
if($user[0]['email'] ==$email){
    $errors['email'][]='takoy polsovatel est';
}
}

// /
if(empty($errors)){
    $request = $db->prepare("
   INSERT INTO `users`(`name`, `surname`, `email`, `phone`, `password`, `agree`) 
   VALUES (?,?,?,?,?,?)
")->execute([
        $formData['name'],
        $formData['surname'],
        $formData['email'],
        $formData['phone'],
        $formData['password'],
        $formData['agree'] ? 1 : 0,
    ]);
    $_SESSION['register-errors']=[];
    header('Location: ../login.php');
}
if(!empty($errors)){
    $_SESSION['register-errors']=$errors;
    header('Location: ../register.php');
}

}else{
echo 'Запрос не верный';
}
?>