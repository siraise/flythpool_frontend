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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font awesome -->
        <link rel="stylesheet" href="modules/css/font-awesome.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="styles/pages/profile.css">
        <link rel="stylesheet" href="styles/settings.css">
        <!-- Favicon -->
        <link rel="icon" href="images/icon.png">
    <title>Новая Жизнь | Страница профиля</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="glavn.php" class="header-link"><i class="fa fa-home"></i> На главную </a>
        </div>
    </header>
    <main>
        <section class="info">
            <div class="container">
                <div class="profile-wrapper">
                    <div class="profile-content">
                        <div class="profile-image">
                            <img src="images/img/negr.jpg" alt="Фотография профиля">
                            <h2 class="username">Собака Новая</h2>
                        </div>
                        <div class="info_item profile-details">
                            <h3>Инфа профиля</h3>
                            <ul>
                                <li><i class="fa fa-phone"></i> Номер телефона: <span>89123456789</span></li>
                                <li><i class="fa fa-envelope"></i> Email: <span>example@mail.com</span></li>
                                <li><i class="fa fa-list"></i> Кол-во добавленных объявлений: <span>10</span></li>
                                <li><i class="fa fa-paw"></i> Питомцев: <span>5</span></li>
                                <li><i class="fa fa-hourglass-end"></i> Дата регистрации: <span>13.11.2024</span></li>
                            </ul>
                            <a  href="api/logoutUser.php" class="logout-btn">
                                <i class="fa fa-sign-out"></i> Выйти
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="advertisements">
            <div class="container">
                <h2 class="section-title">Объявления</h2>
                <div class="filter-wrapper">
                    <select class="status-filter" name="type" id="type">
                        <option value="0">Активно</option>
                        <option value="1">На модерации</option>
                        <option value="2">Найдено</option>
                        <option value="3">В архиве</option>
                    </select>
                </div>
                <ul class="pets-list">
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                    <li class="pet-card">
                        <div class="pet-image">
                            <img src="images/img/pit.jpg" alt="Фото питомца">
                        </div>
                        <div class="pet-info">
                            <small class="pet-date">12.12.2024</small>
                            <h3 class="pet-name">Бибизяна Сёма</h3>
                            <p class="pet-description">Доп Инфа</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
    </main>
</body>
</html>