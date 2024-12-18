<?php session_start(); 

// Проверка аутентификации

include_once('api/db.php');

if (array_key_exists('token', $_SESSION)) {
    $token = $_SESSION['token'];
    $userId = $db->query("
        SELECT id,type FROM users WHERE api_token = '$token'
    ")->fetchAll();

    if (empty($userId)) {
        unset($_SESSION['token']);
        header('Location: login.php');
    } else {
        $type = $userId[0]['type'];
        if ($type != 'mod') {
            header('Location: glavn.php');
        }
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
    <title>Модератор</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="modules/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/pages/moderator.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="icon" href="images/icon.png">
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="glavn.php" class="header-link">← <i class="fa fa-home"></i> На главную</a>
        </div>
    </header>

    <main>
        <section class="filter">
            <div class="container">
                <form action="">
                    <label for="data-form">От</label>
                    <input type="date" id="data-form" name="data-form">
                    <label for="data-to">До</label>
                    <input type="date" id="data-to" name="data-to">
                    <select name="type" id="type">
                        <option value="0">На модерации</option>
                        <option value="1">Активно</option>
                        <option value="2">Найдено</option>
                        <option value="3">Я архиве</option>
                    </select>
                    <button type="submit">Поиск</button>
                </form>
            </div>
        </section>
        <section class="items">
            <div class="container">
                <div class="items-grid">
                    <!-- Карточка объявления -->
                    <div class="item-card">
                        <div class="item-image">
                            <img src="images/img/negr.jpg" alt="Фото объявления">
                        </div>
                        <div class="item-info">
                            <h3 class="item-title">Найден кот</h3>
                            <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                            <div class="item-details">
                                <span class="item-date">12.03.2024</span>
                                <span class="item-status">На модерации</span>
                            </div>
                        </div>
                        <div class="item-actions">
                            <button class="btn-approve">Одобрить</button>
                            <button class="btn-reject">Отклонить</button>
                        </div>
                    </div>
                                    <!-- Карточка объявления -->
                                    <div class="item-card">
                                        <div class="item-image">
                                            <img src="images/img/negr.jpg" alt="Фото объявления">
                                        </div>
                                        <div class="item-info">
                                            <h3 class="item-title">Найден кот</h3>
                                            <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                                            <div class="item-details">
                                                <span class="item-date">12.03.2024</span>
                                                <span class="item-status">На модерации</span>
                                            </div>
                                        </div>
                                        <div class="item-actions">
                                            <button class="btn-approve">Одобрить</button>
                                            <button class="btn-reject">Отклонить</button>
                                        </div>
                                    </div>
                                                        <!-- Карточка объявления -->
                    <div class="item-card">
                        <div class="item-image">
                            <img src="images/img/negr.jpg" alt="Фото объявления">
                        </div>
                        <div class="item-info">
                            <h3 class="item-title">Найден кот</h3>
                            <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                            <div class="item-details">
                                <span class="item-date">12.03.2024</span>
                                <span class="item-status">На модерации</span>
                            </div>
                        </div>
                        <div class="item-actions">
                            <button class="btn-approve">Одобрить</button>
                            <button class="btn-reject">Отклонить</button>
                        </div>
                    </div>
                                        <!-- Карточка объявления -->
                                        <div class="item-card">
                                            <div class="item-image">
                                                <img src="images/img/negr.jpg" alt="Фото объявления">
                                            </div>
                                            <div class="item-info">
                                                <h3 class="item-title">Найден кот</h3>
                                                <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                                                <div class="item-details">
                                                    <span class="item-date">12.03.2024</span>
                                                    <span class="item-status">На модерации</span>
                                                </div>
                                            </div>
                                            <div class="item-actions">
                                                <button class="btn-approve">Одобрить</button>
                                                <button class="btn-reject">Отклонить</button>
                                            </div>
                                        </div>
                                                            <!-- Карточка объявления -->
                    <div class="item-card">
                        <div class="item-image">
                            <img src="images/img/negr.jpg" alt="Фото объявления">
                        </div>
                        <div class="item-info">
                            <h3 class="item-title">Найден кот</h3>
                            <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                            <div class="item-details">
                                <span class="item-date">12.03.2024</span>
                                <span class="item-status">На модерации</span>
                            </div>
                        </div>
                        <div class="item-actions">
                            <button class="btn-approve">Одобрить</button>
                            <button class="btn-reject">Отклонить</button>
                        </div>
                    </div>
                                        <!-- Карточка объявления -->
                                        <div class="item-card">
                                            <div class="item-image">
                                                <img src="images/img/negr.jpg" alt="Фото объявления">
                                            </div>
                                            <div class="item-info">
                                                <h3 class="item-title">Найден кот</h3>
                                                <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                                                <div class="item-details">
                                                    <span class="item-date">12.03.2024</span>
                                                    <span class="item-status">На модерации</span>
                                                </div>
                                            </div>
                                            <div class="item-actions">
                                                <button class="btn-approve">Одобрить</button>
                                                <button class="btn-reject">Отклонить</button>
                                            </div>
                                        </div>
                                                            <!-- Карточка объявления -->
                    <div class="item-card">
                        <div class="item-image">
                            <img src="images/img/negr.jpg" alt="Фото объявления">
                        </div>
                        <div class="item-info">
                            <h3 class="item-title">Найден кот</h3>
                            <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                            <div class="item-details">
                                <span class="item-date">12.03.2024</span>
                                <span class="item-status">На модерации</span>
                            </div>
                        </div>
                        <div class="item-actions">
                            <button class="btn-approve">Одобрить</button>
                            <button class="btn-reject">Отклонить</button>
                        </div>
                    </div>
                                        <!-- Карточка объявления -->
                                        <div class="item-card">
                                            <div class="item-image">
                                                <img src="images/img/negr.jpg" alt="Фото объявления">
                                            </div>
                                            <div class="item-info">
                                                <h3 class="item-title">Найден кот</h3>
                                                <p class="item-description">Серый кот найден в районе улицы Ленина...</p>
                                                <div class="item-details">
                                                    <span class="item-date">12.03.2024</span>
                                                    <span class="item-status">На модерации</span>
                                                </div>
                                            </div>
                                            <div class="item-actions">
                                                <button class="btn-approve">Одобрить</button>
                                                <button class="btn-reject">Отклонить</button>
                                            </div>
                                        </div>
                    <!-- Можно добавить больше карточек по такому же шаблону -->
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>