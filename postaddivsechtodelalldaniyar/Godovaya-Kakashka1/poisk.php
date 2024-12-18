<?php session_start();
include_once 'api/db.php';
$searchParams = $_GET;
$posts;
if (!empty($searchParams)) {
    $animalType = array_key_exists('animal-type',$_GET) ?
    $searchParams['animal-type'] : '';
    $address = array_key_exists('address',$_GET) ? $searchParams['address'] : '';

    $posts = $db->query("
        SELECT * FROM posts WHERE 
        (type_animal = '$animalType' OR address = '$address')
        AND (status = 'active')
    ")->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск животных</title>
    <link rel="stylesheet" href="styles/pages/poisk.css">
    <link rel="icon" href="images/icon.png">
</head>
<body>
    <main>
        <!-- Форма поиска -->
        <section class="search-section">
            <form method="GET" action="poisk.php" class="search-form">
                <select name="animal-type" id="animal-type">
                    <option value="">Вид животного</option>
                    <option value="cat">Кошка</option>
                    <option value="dog">Собака</option>
                </select>
                <input name="address" type="text" placeholder="Район">
                <button type="submit">Найти</button>
            </form>
        </section>

        <!-- Таблица с результатами -->
        <section class="results-section">
            <div class="table-wrapper">
                <table class="results-table">
                    <thead>
                        <tr>
                            <th>Вид животного</th>
                            <th>Фото</th>
                            <th>Описание</th>
                            <th>Клеймо</th>
                            <th>Район</th>
                            <th>Дата находки</th>
                            <th>Ссылка</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (!empty($posts)) {
                                foreach ($posts as $key => $value) {
                                    $type = $value['type_animal'];
                                    $desc = $value['description'];
                                    $mark = $value['mark'];
                                    $address = $value['address'];
                                    $date = $value['date_found'];
                                    $id = $value['id'];
                                    echo "
                                        <tr>
                                            <td>$type</td>
                                            <td><img src='images/img/pit.jpg' alt='Фото животного'></td>
                                            <td>$desc</td>
                                            <td>$mark</td>
                                            <td>$address</td>
                                            <td>$date</td>
                                            <td><a href='info.php?id=$id'>Подробнее</a></td>
                                        </tr>
                                    ";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>