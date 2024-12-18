<?php session_start(); 
include_once 'api/db.php';
$posts = $db
    ->query("SELECT * FROM posts WHERE status = 'active' LIMIT 6")
    ->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font awesome -->
     <link rel="stylesheet" href="modules/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/pages/glavn.css">
    <link rel="stylesheet" href="styles/settings.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <link rel="icon" href="images/icon.png">
    <title>Новая Жизнь | Главная страница</title>
</head>
<body>
    <!-- Шапка сайта -->
    <header class="header">
        <!-- Логотип -->
        <div class="container">
            <a href="glavn.php" class="logo"><img src="images/logo.png" alt="Логотип"><span class="logo-text">Типа новая жзн</span></a>
        <!-- Меню навигации -->
        <nav>
            <ul>
                <li><a href="#" class="search"><i class="fa fa-search"></i></i> Поиск</a></li>
                <li><a href="register.php" class="register"><i class="fa fa-user-plus"></i> Регистрация</a></li>
                <li><a href="login.php" class="profile"><i class="fa fa-user"></i> Личный кабинет</a></li>
                <li><a href="#" class="add"><i class="fa fa-plus-circle"></i> Добавить</a></li>
                <li><a href="#" class="reviews"><i class="fa fa-comments"></i> Отзывы</a></li>
                <?php 
                if(array_key_exists('token', $_SESSION)){
                    echo "<li><a href='api/logoutUser.php' class='reviews'>Выход</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
    </header>

    <!-- Основной контент -->
    <main>
        <!-- Здесь будет основное содержимое страницы -->
        <section class="hero">
            <div class="container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                            foreach ($posts as $key => $value) {
                                $type = $value['type_animal'];
                                $desc = $value['description'];
                                $id = $value['id'];
                                echo "
                                    <div class='swiper-slide'>
                                        <img src='images/img/negr.jpg'>
                                        <small>$type</small> 
                                        <p>$desc</p>
                                        <a href='info.php?id=$id'>Подробнее</a>
                                    </div>
                                ";
                            }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
            </div>
        </section>
        <section class="short-search">
            <div class="container">
                <form method = "GET" action="poisk.php">
                    <label for="type-animal">Вид животного</label>
                    <select name="animal-type" id="type-animal">
                        <option value="Cat">Кот</option>
                        <option value="Dog">Собака</option>
                    </select>
                    <button type="submit">Поиск</button>
                </form>
            </div>
        </section>
        <section class="facts">
            <div class="container">
                <h2>Факты</h2>
                <ul>
                    <li>
                        <i class="fa fa-universal-access"></i>
                        <h3>Помогли найти более 500 животных.</h3>
                    </li>
                    <li>
                        <i class="fa fa-heart"></i>
                        <h3>Более трех лет способствуем возвращению питомцев к хозяевам.</h3>
                    </li>
                    <li>
                        <i class="fa fa-home"></i>
                        <h3>Все услуги оказываются бесплатно.</h3>
                    </li>
                </ul>
            </div>
        </section>  
        <section class="search"> 
            <div class="container"> 
                <div class="search-item"> 
                    <form method ="$_GET" action = "poisk.php"> 
                        <label for="place">Район</label> 
                        <select name="address" id="place"> 
                            <option value="adres adres d 17 25">adres adres d 17 25 </option>  
                        </select> 
                        <label for="animal">Вид животного</label> 
                        <select name="animal_type" id="animal"> 
                        <option value="cat">Кот</option> 
                        <option value="dog">Собака</option> 
                        <option value="rabbit">Кролик</option> 
                        <option value="hamster">Хомяк</option> 
                        <option value="parrot">Попугай</option> 
                    </select> 
                        <button type="submit">Поиск</button> 
                    </form> 
                </div> 
                <div class="search-item">
                    <img src="images/img/negr.jpg" alt="Картинка" class="responsive-image">
                </div>
            </div> 
        </section>
        <section class="reviews">
            <div class="container">
                <h2>Отзывы</h2>
                <div class="swiper reviews-swiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                            <div class="author">
                                <img src="images/img/author.png" alt="Фото автора" class="author-photo">
                                <h3 class="author-name">Чёрненнький Дима</h3>
                            </div>
                            <img src="images/img/pit.jpg" alt="Фото питомца" class="pet-photo">
                            <h3 class="author-name">Бибизяна Сёма</h3>
                            <p class="review-text">Я и мой друг нашли друг друга благодаря этому сайту, мы счастливы вместе 
                                и я рекомендую этот сайт всем своим друзьям и знакомым.</p>
                            <span class="review-date">01.01.2024</span>
                      </div>
                      <div class="swiper-slide">
                        <div class="author">
                            <img src="images/img/author.png" alt="Фото автора" class="author-photo">
                            <h3 class="author-name">Чёрненнький Дима</h3>
                        </div>
                        <img src="images/img/pit.jpg" alt="Фото питомца" class="pet-photo">
                        <h3 class="author-name">Бибизяна Сёма</h3>
                        <p class="review-text">Я и мой друг нашли друг друга благодаря этому сайту, мы счастливы вместе 
                            и я рекомендую этот сайт всем своим друзьям и знакомым.</p>
                        <span class="review-date">01.01.2024</span>
                  </div>
                  <div class="swiper-slide">
                    <div class="author">
                        <img src="images/img/author.png" alt="Фото автора" class="author-photo">
                        <h3 class="author-name">Чёрненнький Дима</h3>
                    </div>
                    <img src="images/img/pit.jpg" alt="Фото питомца" class="pet-photo">
                    <h3 class="author-name">Бибизяна Сёма</h3>
                    <p class="review-text">Я и мой друг нашли друг друга благодаря этому сайту, мы счастливы вместе 
                        и я рекомендую этот сайт всем своим друзьям и знакомым.</p>
                    <span class="review-date">01.01.2024</span>
              </div>
              <div class="swiper-slide">
                <div class="author">
                    <img src="images/img/author.png" alt="Фото автора" class="author-photo">
                    <h3 class="author-name">Чёрненнький Дима</h3>
                </div>
                <img src="images/img/pit.jpg" alt="Фото питомца" class="pet-photo">
                <h3 class="author-name">Бибизяна Сёма</h3>
                <p class="review-text">Я и мой друг нашли друг друга благодаря этому сайту, мы счастливы вместе 
                    и я рекомендую этот сайт всем своим друзьям и знакомым.</p>
                <span class="review-date">01.01.2024</span>
          </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
            </div>
        </section>
    </main>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
      },

    });

    var reviewsSwiper = new Swiper(".reviews-swiper", {
    slidesPerView: 3,
    spaceBetween: 30,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    // Добавляем брейкпоинты для адаптивности
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 30
        }
    }
    });
  </script>
</body>
</html>