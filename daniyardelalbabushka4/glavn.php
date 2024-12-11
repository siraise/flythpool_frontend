<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Fonts Awesome-->
    <link rel="stylesheet" href="library/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/pages/glavn.css">
    <link rel="stylesheet" href="styles/settings.css">
    <title>Главная страница</title>
</head>
<body>
    <!-- Шапка сайта -->
    <header class="header">
        <!-- Логотип -->
        <div class="container">
            <a href="glavn.php" class="logo"><img src="images/logo.png" alt="Логотип"><span class="logo-text">New Life</span></a>
        <!-- Меню навигации -->
        <nav>
            <ul>
                <li><a href="search.php" class="search"><i class="fa fa-search"></i> Поиск</a></li>
                <li><a href="info.php" class="add"><i class="fa fa-check"></i>Найдено</a></li>
                <li><a href="add.php" class="reviews"><i class="fa fa-shield"></i>Добавить Объявления</a></li>
                <li><a href="register.php" class="register"><i class="fa fa-user-plus"></i> Регистрация</a></li>
                <li><a href="login.php" class="reviews"><i class="fa fa-sign-in"></i>Авторизация</a></li>
                <li><a href="profile.php" class="profile"><i class="fa fa-user"></i> Личный кабинет</a></li>
                <li><a href="moder.php" class="reviews"><i class="fa fa-shield"></i>Кабинет модератора</a></li>
                <?php 
                if(array_key_exists('token',$_SESSION)){
                    echo"<li><a href='API/lagoutUser.php' class='reviews'>Выход</a></li>";
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
                      <div class="swiper-slide"><img src="images/img/sab.webp">
                        <small>Собака</small> 
                        <p>Потеряна собака в парке.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.jpg">
                        <small>Собака</small> 
                        <p>Давно ушла за покупками и не вернулась.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.webp">
                        <small>Собака</small> 
                        <p>Потеряна собака в парке.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.jpg">
                        <small>Собака</small> 
                        <p>Давно ушла за покупками и не вернулась.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.webp">
                        <small>Собака</small> 
                        <p>Потеряна собака в парке.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.jpg">
                        <small>Собака</small> 
                        <p>Давно ушла за покупками и не вернулась.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.webp">
                        <small>Собака</small> 
                        <p>Потеряна собака в парке.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.jpg">
                        <small>Собака</small> 
                        <p>Давно ушла за покупками и не вернулась.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    <div class="swiper-slide"><img src="images/img/sab.webp">
                        <small>Собака</small> 
                        <p>Потеряна собака в парке.</p>
                        <a href="#">Подробнее</a>
                    </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
            </div>
        </section>
        <section class="short-search">
            <form>
                <label for="type-animal">Вид животного</label>
                <select name="type-animal" id="type-animal">
                    <option value="cat">Кот</option>
                    <option value="dog">Собака</option>
                    <option value="rabbit">Кролик</option>
                    <option value="hamster">Хомяк</option>
                    <option value="parrot">Попугай</option>
                </select>
                <button type="submit">Поиск</button>
            </form>
        </section>
        <section class="facts">
            <div class="container">
                <h2>Интересные факты</h2>
                <ul>
                    <li>
                        <i class="fa fa-check"></i>
                        <h3>Помогли найти более 500 животных.</h3>
                    </li>
                    <li>
                        <i class="fa fa-clock-o"></i>
                        <h3>Более трех лет способствуем возвращению питомцев к хозяевам.</h3>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <h3>Все услуги оказываются бесплатно.</h3>
                    </li>
                </ul>
            </div>
        </section>
        <section class="search">
            <div class="container">
                <div class="search-item">
                    <form>
                        <label for="place">Район</label>
                        <select name="place" id="place">
                            <option value="0">Правый берег</option>
                            <option value="1">Левый берег</option>
                        </select>
                        <label for="animal">Вид животного</label>
                        <select name="animal" id="animal">
                        <option value="cat">Кот</option>
                        <option value="dog">Собака</option>
                        <option value="rabbit">Кролик</option>
                        <option value="hamster">Хомяк</option>
                        <option value="parrot">Попугай</option>
                    </select>
                        <button type="submit">Поиск</button>
                    </form>
                </div>
                <div class="search-itemimg">
                    <img src="images/img/avatar.jpg">
                </div>
            </div>
        </section>
        <section class="reviews">
            <div class="container">
                <h2>Отзывы</h2>
                <div class="swiper reviews-swiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="review-card">
                            <div class="review-header">
                                <img src="images/img/avatar.jpg" alt="Фото автора" class="author-avatar">
                                <div class="review-info">
                                    <h3 class="author-name">Анна Петрова</h3>
                                    <span class="review-date">15 марта 2024</span>
                                </div>
                            </div>
                            <div class="review-pet">
                                <img src="images/img/pet-photo.jpeg" alt="Фото питомца" class="pet-photo">
                            </div>
                            <p class="review-text">
                                Благодаря этому сайту я нашла своего потерянного парня. 
                                Спасибо большое за помощь и поддержку. Сервис работает отлично, 
                                откликнулось много неравнодушных людей.
                            </p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="review-card">
                            <div class="review-header">
                                <img src="images/img/avatar.jpg" alt="Фото автора" class="author-avatar">
                                <div class="review-info">
                                    <h3 class="author-name">Анна Петрова</h3>
                                    <span class="review-date">15 марта 2024</span>
                                </div>
                            </div>
                            <div class="review-pet">
                                <img src="images/img/pet-photo.jpeg" alt="Фото питомца" class="pet-photo">
                            </div>
                            <p class="review-text">
                                Благодаря этому сайту я нашла своего потерянного парня. 
                                Спасибо большое за помощь и поддержку. Сервис работает отлично, 
                                откликнулось много неравнодушных людей.
                            </p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="review-card">
                            <div class="review-header">
                                <img src="images/img/avatar.jpg" alt="Фото автора" class="author-avatar">
                                <div class="review-info">
                                    <h3 class="author-name">Анна Петрова</h3>
                                    <span class="review-date">15 марта 2024</span>
                                </div>
                            </div>
                            <div class="review-pet">
                                <img src="images/img/pet-photo.jpeg" alt="Фото питомца" class="pet-photo">
                            </div>
                            <p class="review-text">
                                Благодаря этому сайту я нашла своего потерянного парня. 
                                Спасибо большое за помощь и поддержку. Сервис работает отлично, 
                                откликнулось много неравнодушных людей.
                            </p>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="review-card">
                            <div class="review-header">
                                <img src="images/img/avatar.jpg" alt="Фото автора" class="author-avatar">
                                <div class="review-info">
                                    <h3 class="author-name">Анна Петрова</h3>
                                    <span class="review-date">15 марта 2024</span>
                                </div>
                            </div>
                            <div class="review-pet">
                                <img src="images/img/pet-photo.jpeg" alt="Фото питомца" class="pet-photo">
                            </div>
                            <p class="review-text">
                                Благодаря этому сайту я нашла своего потерянного парня. 
                                Спасибо большое за помощь и поддержку. Сервис работает отлично, 
                                откликнулось много неравнодушных людей.
                            </p>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                  </div>
            </div>
        </section>
        <section class="sub">
            <div class="container">
                <form>
                    <label for="email">Почта</label>
                    <input type="email" name="email" id="email" placeholder="example@mail.ru">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" name="agree" id="agree">
                        <label for="agree">Согласие на обработку данных</label>
                    </div>
                    <button type="submit">Подписаться</button>
                </form>
            </div>
        </section>
        <!--Подвал сайта--> 
        <footer class="footer"> 
            <div class="container"> 
                <div class="footer-item"> 
                    <a class="tel" href="tel:8800553555">8 800 555 35 55</a> 
                    <a class="mail" href="mailto:mail@newlife.ru">mailto:mail@newlife.ru</a> 
                </div> 
                <div class="footer-item"> 
                    <ul> 
                        <li><a href="glavn.html">Главная</a></li>
                        <li><a href="glavn.html">Регистрация</a></li> 
                        <li><a href="glavn.html">Авторизация</a></li> 
                        <li><a href="glavn.html">Личный кабинет</a></li> 
                        <li><a href="glavn.html">Найдено животное</a></li>
                        <li><a href="glavn.html">Поиск</a></li>    
                    </ul> 
                </div> 
                </div> 
             
        </footer>
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
    });
  </script>
</body>
</html>