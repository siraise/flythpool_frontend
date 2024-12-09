<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
    <link rel="stylesheet" href="search.css">
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
                <div class="imog">
                    <img src="images\img\images.jpg" alt="">
                </div>
                <div class="info_item">
                <form class="search-form">
                    <div class="search-input">
                        <input type="text" placeholder="Поиск объявлений...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="search-filters">
                        <select name="category">
                            <option value="">Все категории</option>
                            <option value="dogs">Собаки</option>
                            <option value="cats">Кошки</option>
                            <option value="other">Другие животные</option>
                        </select>
                        <select name="district">
                            <option value="">Все районы</option>
                            <option value="central">Центральный</option>
                            <option value="north">Северный</option>
                            <option value="south">Южный</option>
                        </select>
                        <select name="status">
                            <option value="">Все статусы</option>
                            <option value="lost">Потерян</option>
                            <option value="found">Найден</option>
                        </select>
                    </div>
                </form>
                </div>
            </div>
        </section>
        <section class="hero">
            <div class="container">
                <div class="obyav">
                    <h2>Объявления</h2>
                    <select name="type" id="type">
                        <option value="0">Активно</option>
                        <option value="1">На модерации</option>
                        <option value="2">Найдено</option>
                        <option value="3">В архиве</option>
                    </select>
                </div>
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