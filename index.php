<?php

    session_start();

    $logged_user = isset($_SESSION['logged_user']) ? $_SESSION['logged_user'] : null;

    $a=0;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Электронная библиотека</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <link rel="stylesheet" href="css/slider.css" type="text/css">

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>


</head>
<body>
    <header>
        <div class="container">
            <div class="main_header">
                <div class="header">

                    <div class="logo">
                        <a href="index.html"><img src="img/logo/Logo.PNG" alt=""></a>
                    </div>
    
                    <div class="search">
                        <input class="input_search" type="text" placeholder="Книга или автор"> 
                    </div>
    
                    <div class="header_menu">
                        <ul class="menu_list">
                            <a href="dashboard/dashboard.html"><li class="menu_item">Что почитать</li></a>
                            <a href="Lib/Library.html"><li class="menu_item">Библиотека</li></a>  
                            <a href="#"><li class="menu_item">Подписка</li></a>   
                        </ul>
                    </div>
                </div> 

                <div class="auth">
                    <?php
                        if(empty($_SESSION['logged_user'])){
                    ?>
                        <a href="authorization/auth.php" class="log_in">Войти |</a>
                        <a href="registration/registration.php" class="sign_in">Зарегистрироваться</a>
                    <?php
                        }
                        else{
                    ?>
                        <span class="logged_user"><?php echo $_SESSION['logged_user']; ?><a href="logout/logout.php"> | Выйти</a></span>
                    <?php
                        }
                    ?>
                    
                </div>

            </div>
        </div>
    </header>

    <main>
        <section>       
            <div class="line container"></div>
    
            <div class="Title container">
                <h1>
                    LibBook - читай <br>
                    книги с<br>
                    удовольствием
                </h1>
            </div>
    
            <ul class="menu_list_new container menu_list">
                <li class="item">
                    <i class="fas fa-book"></i><br>
                    <span>
                        <b>181 &nbsp;000</b>
                        <br> книг
                    </span>
                </li>
    
                <li class="item">
                    <i class="far fa-star"></i><br>
                    <span>
                        <b>+ 2 &nbsp;000</b> новинок
                        <br> каждый месяц
                    </span>
                </li>
    
                <li class="item">
                    <i class="fas fa-puzzle-piece"></i><br>
                    <span>
                        <b>Подборки</b>
                        <br>и рекомендации
                    </span> 
                </li>
    
                <li class="item">
                    <i class="fas fa-wifi"></i><br>
                    <span>
                        <b>Онлайн</b>
                        <br>или офлайн
                    </span> 
                </li>
            </ul>
    
            <div class="line container"></div>
    
    
            <div class="main_body container">           
                <div class="ListBook">
                    <div class="nameList">
                        <span>Мы добавляем лучшие новинки</span>                 
                        <p class="inf">2000 книг каждый день. Модные авторы и эксклюзивные издательства</p>           
                    </div>
                    <div class="box_slider">
                        <div class="Items">
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div>  
                            
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div>  
        
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div>  
        
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div>  
        
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div> 
        
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div> 
        
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div> 
        
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div> 

                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div> 
        
                            <div class="bookItem">
                                <div class="photo">
                                    <a href="book/book.html"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                                </div>
                                <div class="name repeat">
                                    <span class="repeat">Айвенго</span>
                                </div>
                                <div class="autor repeat">
                                    <span class="repeat">Вальтер Скотт</span>
                                </div>
                            </div>
            
                        </div> 
                    </div>
                </div>
    
                <div class="ListBook">
                    <div class="nameList">
                        <span>Десятки тысяч бесплатныйх книг</span>                 
                        <p class="inf">Родная классика и проверенные временем бестселлеры всегда бесплатно</p>           
                    </div>
                    <div class="Items">
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div>  
                        
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div>  
    
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div>  
    
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div>  
    
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div> 
    
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div> 
    
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div> 
    
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div> 

                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div> 
    
                        <div class="bookItem">
                            <div class="photo">
                                <a href="#"><img src="img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat">Айвенго</span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat">Вальтер Скотт</span>
                            </div>
                        </div>
        
                    </div> 
                </div>               
            </div>
        </section>

        <div class="Text_Container container">
            <h2 class="main_paragraph">Читайте книги, где угодно</h2>
            <article class="Text_arcticle">
                <section class="Text_section">
                    <h3 class="paragraph">Новинки, классика и бестселлеры</h3>
                    <p class="text">
                        LibBook — самая большая библиотека электронных книг 
                        и аудиокниг на русском языке по подписке. 
                        Более 150 000 произведений всех жанров в мобильном приложении и на сайте: 
                        детективы, фантастика, фэнтези, любовные романы, книги по бизнесу, психологии,
                        детей, современная и классическая литература. Новинки поступают каждый день — 
                        как в книжном магазине, только удобнее. Некоторые электронные книги в библиотеке 
                        бесплатны, их можно читать без подписки. Это классические произведения из школьной 
                        программы и современная литература начинающих авторов.
                    </p>

                    <h3 class="paragraph">Вся коллекция — в приложении</h3>
                    <p class="text">
                        Мы рады видеть вас на сайте — здесь вы можете читать и слушать книги 
                        онлайн. Но удобнее — в приложении. Смартфон всегда под рукой, а значит, 
                        с вами все нужные книги. Мобильное приложение для iOS и Android — 
                        это ваша коллекция в смартфоне и на планшете. Читать в электронной 
                        библиотеке LibBook можно в любой ситуации, даже без сети. Для этого 
                        откройте нужную книгу в режиме чтения с включенным интернетом — 
                        так она сохранится в память устройства, и в дальнейшем доступ к сети не 
                        понадобится. Сохраняйте в свою библиотеку сколько угодно книг.
                    </p>
                </section>

                <section class="Text_section">
                    <h3 class="paragraph">Рекомендуем хорошие книги</h3>
                    <p class="text">
                        Подборки в LibBook — помощники в выборе подходящих произведений по настроению,
                        теме, сезону, популярности или экспертной оценке. Мы отбираем лучшие книги
                        и аудиокниги в нашей электронной библиотеке, чтобы вам не приходилось 
                        тратить время на поиски. Рассказываем о лауреатах книжных премий и 
                        победителях конкурсов. Подсказываем, что модно, а что малоизвестно, 
                        что почитать в отпуске, зимой и летом, в дороге и дома. Большой выбор 
                        хороших книг — в разделе «Что читать» на сайте и в приложении.
                    </p>

                    <h3 class="paragraph">Ничего не потеряется</h3>
                    <p class="text">
                        Сайт libbook.ru и мобильные приложения на ваших устройствах — это единое 
                        целое. Вся библиотека и данные о чтении синхронизируются каждую минуту, 
                        поэтому начать читать можно на смартфоне по пути на работу, а продолжить — 
                        с планшета, сидя дома на диване. При этом заметки, цитаты и закладки — 
                        полезное дополнение для вдумчивого читателя — также переносятся. Все важные 
                        идеи, емкие фразы и инструкции, которые вы выделите, хранятся в разделе 
                        заметок. На сайте доступна выгрузка всех заметок в текстовый документ.
                    </p>
                </section>
            </article>
        </div>
        
    </main>
    

    <footer>
        <div class="footer container">
            <div class="project">
                <p class="bold">О проекте Library</p>
                <a href="#"><li>О проекте</li></a>
                <a href="#"><li>Условия использования</li></a>
                <a href="#"><li>Политика конфиденциальности</li></a>
            </div>

            <div class="application">
                <p class="bold">Скачать приложение</p>
                <a href="#"><i class="fab fa-android"></i></a>
                <a href="#"><i class="fab fa-apple"></i></a>
            </div>

            <div class="news">
                <p class="bold">Следите за новостями</p>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-vk"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-odnoklassniki"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>

            <div class="support">
                <p class="bold">Служба поддержки</p>
                <div class="phone_field">
                    <p>8-800-333-27-37</p>
                </div>
                <p>support@library.ru</p>
            </div>

        </div>
    </footer>
</body>
</html>