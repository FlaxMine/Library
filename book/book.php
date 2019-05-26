<?php

    session_start();

    require "../database/connection.php";
    $link = ConnectionDB();

    $id = $_REQUEST['id'];

    $query = "SELECT * FROM 
                        (SELECT * FROM detailed_information JOIN book on detailed_information.id_book=book.id) AS HELLO 
                WHERE id=$id";
    $result = mysqli_query($link, $query);

    $detailed_information = mysqli_fetch_array($result)

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
    <link rel="stylesheet" href="book.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css"/>
    <link rel="stylesheet" href="../css/slider.css" type="text/css">
    <link rel="stylesheet" href="../css/menu.css" type="text/css">

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
                        <a href="../index.php"><img src="../img//logo/Logo.PNG" alt=""></a>
                    </div>
    
                    <div class="search">
                        <input class="input_search" type="text" placeholder="Book or author"> 
                    </div>
    
                    <div class="header_menu">
                        <ul class="menu_list">
                            <a href="dashboard.php"><li class="menu_item">What to read</li></a>
                            <a href="../Lib/Library.php"><li class="menu_item">Library</li></a>    
                        </ul>
                    </div>
                </div> 

                <div class="auth">
                    <a href="../authorization/auth.php" class="log_in">Sign in |</a>
                    <a href="../registration/registration.php" class="sign_in">Sign up</a>
                </div>

            </div>
        </div>
    </header>

    <div class="menu container">
        <ul class="items_menu">
            <li class="item_menu">
                <a href="#">LibBook <i class="fas fa-minus"></i> &nbsp;E-Library</a>
            </li>
            <li class="item_menu">
                <a href="#"><span class="image_arrow"> <i class="fas fa-chevron-right"></i> &nbsp;Library</span></a>
            </li>
            <li class="item_menu">
                <a href="../author/author.html"><span class="image_arrow"> <i class="fas fa-chevron-right"></i> &nbsp;Алексей Благирев</span></a>
            </li>
            <li class="item_menu">
                <a href="#"><span class="image_arrow"> <i class="fas fa-chevron-right"></i> &nbsp;Big data простым языком</span></a>
            </li>
        </ul>
    </div>

    <div class="content container">
        <div class="book">
            <div class="image_book">
                <img src="../<?php echo $detailed_information['img'];?>" width="256" height="426" alt="">
            </div>
            
            <div class="book_information">
                <h1 class="name_book"><?php echo $detailed_information['name'];?></h1>
                <div class="about_book">
                    <h3 class="about">About book</h3>
                    <p class="text">   
                        <?php echo $detailed_information['description'];?>
                    </p>
                    <div class="detailed_information">
                        <h3>Detailed information</h3>
                        <div>
                            <p class="text">Date of writing: <?php echo $detailed_information['year_write'];?></p>
                            <p class="text">The year of publishing: <?php echo $detailed_information['year_edition'];?></p>
                            <p class="text">Quantity pages: <?php echo $detailed_information['quantity_page'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <footer>
        <div class="footer container">
            <div class="project">
                <p class="bold">About project of Library</p>
                <a href="#"><li>About project</li></a>
                <a href="#"><li>Terms of Use</li></a>
                <a href="#"><li>Privacy policy</li></a>
            </div>

            <div class="application">
                <p class="bold">Download application</p>
                <a href="#"><i class="fab fa-android"></i></a>
                <a href="#"><i class="fab fa-apple"></i></a>
            </div>

            <div class="news">
                <p class="bold">Follow the news</p>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-vk"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-odnoklassniki"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>

            <div class="support">
                <p class="bold">Support</p>
                <div class="phone_field">
                    <p>8-800-333-27-37</p>
                </div>
                <p>support@library.ru</p>
            </div>

        </div>
    </footer>
</body>
</html>