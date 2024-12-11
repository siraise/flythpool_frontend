<?php
session_start();
include_once'API/db.php';
    $searchParams = $_GET;
    if(!empty($searchParams)){
    $animalType = $searchParams['animal-type'];
    $address = $searchParams['address'];


    $posts = $db->query("
    SELECT * FROM posts WHERE
     type_animal ='$animalType' OR address ='$address'
     ")->fetchAll();
}
?>
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
                <form class="search-form" method ="GET" action="poisk.php">
                    <div class="search-input">
                    <select name="animal-type" id="animal-type">
                            <option value="">ВИД ЖИВОТНОГО</option>
                            <option value="cat">Кошка</option>
                            <option value="dog">Сабака</option>
                        </select>
                        <input name="address" type="text" placeholder="Поиск объявлений...">
                        <button type="submit">Найти</button>
                    </div>
                </form>
                </div>
            </div>
        </section>
        <section class= "table">
<?php
if(!empty($posts)){
foreach($posts as $key => $value){
    $type =$value['type_animal'];
    $desc =$value['description'];
    $mark =$value['mark'];
    $address =$value['address'];
    $date =$value['date_found'];
    $id =$value['id'];
echo "
<ul>
<li>Тип:$type</li>
<li>Опсание:$desc</li>
<li><img src='images/img/cat.jpg'/></li>
<li>Отлиситаельная черта:$mark</li>
<li>адес:$address</li>
<li>Дата:$date</li>
<li><a href ='info.php?id = $id'>Подробнее</a></li>
</ul>
";
}
}
?>
<style>
    img{
    width: 350px;
    height: 300px;
}
</style>
    </section>
    </main>
</body>
</html>