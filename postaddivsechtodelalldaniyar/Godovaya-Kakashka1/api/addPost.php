<?php
session_start();
include_once './db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Проверка наличия токена в сессии
    if (array_key_exists('token', $_SESSION)) {
        $token = $_SESSION['token'];

        // Получение ID пользователя по токену
        $stmt = $db->prepare("SELECT id FROM users WHERE api_token = :token");
        $stmt->execute(['token' => $token]);
        $userId = $stmt->fetch();

        // Если пользователь не найден, перенаправляем на страницу входа
        if (!$userId) {
            unset($_SESSION['token']);
            header('Location: ../login.php');
            exit;
        }
    } else {
        header('Location: ../login.php');
        exit;
    }

    // Получение и валидация данных из формы
    $animalType = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
    $mark = filter_input(INPUT_POST, 'mark', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);

    // Проверка на заполненность обязательных полей
    if (empty($animalType) || empty($description) || empty($address) || empty($date)) {
        echo "Пожалуйста, заполните все обязательные поля.";
        exit;
    }

    // Вставка данных в таблицу posts
    $stmt = $db->prepare("
        INSERT INTO posts (user_id, type_animal, description, mark, address, date_found) 
        VALUES (:user_id, :type, :description, :mark, :address, :date)
    ");
    
    // Выполнение запроса
    $result = $stmt->execute([
        'user_id' => $userId['id'], // ID текущего пользователя
        'type' => $animalType,
        'description' => $description,
        'mark' => $mark,
        'address' => $address,
        'date' => $date,
    ]);

    // Проверка успешности вставки
    if ($result) {
        echo "Информация о животном успешно добавлена.";
    } else {
        echo "Ошибка при добавлении информации. Пожалуйста, попробуйте снова.";
    }
} else {
    echo 'Неверный запрос.';
}
?>
