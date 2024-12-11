<?php session_start();
include_once'API/db.php';
if(!array_key_exists('id', $_GET)){
  header("Location:poisk.php");

  exit;
}
//
$id = $_GET['id'];
$post = $db->query(
  "SELECT * FROM posts WHERE id = '$id'"
)->fetchAll();
if(empty($post)){
  header("Location:poisk.php");
  exit;
}
echo json_encode($post);
///poisk
$userId -$post[0]['user_id'];
$user =$db->query(
  "SELECT * FROM users WHERE id = '$userId'"
)->fetchAll();
echo json_encode($user);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Найдено</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="info.css">
</head>
<body>
    <header>
        <div class="container">
            <a href="poisk.php">На Страницу поиска</a>
        </div>
    </header>
    <main>
        <section class="info">
            <div class="container">
                <div class="info_item">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                      </div>
                      <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                          <div class="swiper-slide">
                            <img src="images/img/sab.webp" />
                          </div>
                        </div>
                      </div>
                </div>
                <div class="info_item">
                <div class="pet-info">
                    <ul>
                        <li><strong>Вид животного:</strong> Пчиххуня</li>
                        <li><strong>Имя нашедшего:</strong> Петя Петрович</li>
                        <li><strong>Контактный телефон:</strong> 89234567890</li>
                        <li><strong>Email:</strong> Petr@example.com</li>
                        <li><strong>Дополнительная информация:</strong> Собака была найдена в парке, бегала без ошейника. Очень дружелюбная, знает команду:ФАС</li>
                        <li><strong>Клеймо:</strong> Отсутствует</li>
                        <li><strong>Район:</strong> Центральный</li>
                        <li><strong>Дата находки:</strong> 15.12.2024</li>
                    </ul>
                </div>
                </div>
            </div>  
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>
</body>
</html>