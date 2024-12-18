<?php session_start(); 
include_once 'api/db.php';
if (!array_key_exists('id', $_GET)) {
  header("Location: poisk.php");
  exit;
}
// 
$id = $_GET['id'];
$post = $db->query(
  "SELECT * FROM posts WHERE id = '$id'"
)->fetchAll();
if (empty($post)) {
  header("Location: poisk.php");
  exit;
}
// next
$userId = $post[0]['user_id'];
$user = $db->query(
  "SELECT * FROM users WHERE id = '$userId'"
)->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о животных</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="modules/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/pages/info.css">
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="icon" href="images/icon.png">
</head>

<header class="header">
    <div class="container">
        <a href="glavn.php" class="header-link">← <i class="fa fa-home"></i> На главную</a>
        <a href="poisk.php" class="header-link"><i class="fa fa-search"></i> Поиск</a>
    </div>
</header>

<body>
    <main>
        <section class="info">
            <div class="container">
                <div class="info_item">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                          </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                      </div>
                      <div thumbsSlider="" class="swiper mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                          </div>
                        </div>
                      </div>
                </div>
                <div class="info_item">
                    <time datetime="29-11-2024">
                      <?php echo $post[0]['date_found']; ?>
                    </time>
                    <small>
                    <?php echo $post[0]['status']; ?>
                    </small>
                    <h2>
                      <?php echo $post[0]['type_animal']; ?>
                    </h2>
                    <p><?php echo $post[0]['address']; ?></p>
                    <p><?php echo $post[0]['description']; ?></p>
                    <p><?php echo $user[0]['name'] . " " . $user[0]['surname'] ?></p>
                    <?php $phone = $user[0]['phone']; echo "<a href='tel:$phone'>$phone</a>"?>
                    <?php $email = $user[0]['email']; echo "<a href='mailto:$email'>$email</a>"?>
                </div>
            </div>
        </section>
    </main>

        <!-- Слайдер Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

      <!-- Инициализация Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
      breakpoints: {
          320: {
              slidesPerView: 3,
              spaceBetween: 5
          },
          576: {
              slidesPerView: 4,
              spaceBetween: 8
          },
          992: {
              slidesPerView: 4,
              spaceBetween: 10
          }
      }
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