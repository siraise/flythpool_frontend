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
                <form class="search-form" method ="GET" action="API/poisk.php">
                    <div class="search-input">
                    <select name="animal-type" id="animal-type">
                            <option value="">ВИД ЖИВОТНОГО</option>
                            <option value="">Кошка</option>
                            <option value="">Сабака</option>
                        </select>
                        <input name="address" type="text" placeholder="Поиск объявлений...">
                        <button type="submit">Найти</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>