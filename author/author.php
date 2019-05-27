<?php

    session_start();

    require "../database/connection.php";
    $link = ConnectionDB();

    $id = $_REQUEST['id_author'];

    $query = "SELECT * FROM 
                    (SELECT * FROM author JOIN information_author on author.id = information_author.id_author) AS INFORMATION
              WHERE author.id = $id";

    $result = mysqli_query($link, $query);  

    $author_information = mysqli_fetch_array($result);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Library</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
    <link rel="stylesheet" href="author.css" type="text/css">
    <link rel="stylesheet" href="../book/book.css" type="text/css">
    <link rel="stylesheet" href="../css/slider.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css"/>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/slick.min.js"></script>
    <script type="text/javascript" src="../js/slider.js"></script>

</head>
<body>
    <header>
        <div class="container">
            <div class="main_header">
                <div class="header">

                    <div class="logo">
                        <a href="../index.php"><img src="../img/logo/Logo.PNG" alt=""></a>
                    </div>
    
                    <div class="search">
                        <input class="input_search" type="text" placeholder="Книга или автор"> 
                    </div>
    
                    <div class="header_menu">
                        <ul class="menu_list">
                            <a href="dashboard.php"><li class="menu_item">What to read</li></a>
                            <a href="../Lib/Library.php"><li class="menu_item">Library</li></a>    
                        </ul>
                    </div>
                </div> 

                <div class="auth">
                    <a href="#" class="log_in">Sign in |</a>
                    <a href="#" class="sign_in">Sing up</a>
                </div>

            </div>
        </div>
    </header>

    <div class="menu container">
        <ul class="items_menu">
            <li class="item_menu">
                <a href="#">LibBook <i class="fas fa-minus"></i> &nbsp;Электронная библиотека</a>
            </li>
            <li class="item_menu">
                <a href="#"><span class="image_arrow"> <i class="fas fa-chevron-right"></i> &nbsp;Библиотека</span></a>
            </li>
            <li class="item_menu">
                <a href="../author/author.html"><span class="image_arrow"> <i class="fas fa-chevron-right"></i> &nbsp;Алексей Благирев</span></a>
            </li>
        </ul>
    </div>

    <div class="author container">
        <div class="author_img">
            <?php 
                if($author_information['img'] == ""){
                    $img = "../img/author_img/default_author.png";
                }else{$img = "../" . $author_information['img'];}
            ?>
            <img src="<?php echo $img;?>" height="128" alt="">
        </div>
        
        <div class="author_information">
            <h1 class="name_author"><?php echo $author_information['FIO'];?></h1>
            <div class="about_author">
                <h3 class="about">Об авторе</h3>
                <p class="text"><?php echo $author_information['about_author'];?></p>
            </div>
        </div>   
    </div>

    <div class="ListBook container">
        <div class="nameList">
            <span>Все книги автора</span>                 
            <p class="inf">97 книг</p>           
        </div>

        <div class="box_slider">
            <div class="Items">
                <div class="bookItem">
                    <div class="photo">
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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
                        <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
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