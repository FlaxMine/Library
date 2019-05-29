<?php

    session_start();

    require "../database/connection.php";
    require "../functionsPHP/getBooksByGenre.php";

    $link = ConnectionDB();

    $genre = $_REQUEST['genre'];

    $books = getBooks($link, $genre);

    $query = "SELECT id FROM genre WHERE genre = '$genre'";
    $result = mysqli_query($link, $query);

    $id_genre = mysqli_fetch_array($result);
    $id = $id_genre['id'];

    $query_get_description_genre = "SELECT description FROM about_genre WHERE id_genre = $id";
    $result2 = mysqli_query($link, $query_get_description_genre);

    $description_genre = mysqli_fetch_array($result2);


    $a = 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E_Library</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css"/>
    <link rel="stylesheet" href="../css/slider.css" type="text/css">
    <link rel="stylesheet" href="books.css" type="text/css">

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
                        <input class="input_search" type="text" placeholder="Book or author"> 
                    </div>
    
                    <div class="header_menu">
                        <ul class="menu_list">
                            <a href="../dashboard/dashboard.php"><li class="menu_item">What to read</li></a>
                            <a href="../Lib/Library.php"><li class="menu_item">Library</li></a>   
                        </ul>
                    </div>
                </div> 

                <div class="auth">
                    <?php
                        if(empty($_SESSION['logged_user'])){
                    ?>
                        <a href="../authorization/auth.php" class="log_in">Sign in |</a>
                        <a href="../registration/registration.php" class="sign_in">Sing up</a>
                    <?php
                        }
                        else{
                    ?>
                        <span class="logged_user"><?php echo $_SESSION['logged_user']; ?><a href="../logout/logout.php"> | Выйти</a></span>
                    <?php
                        }
                    ?>
                    
                </div>

            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="head">
                <div class="backRow">
                    <a href="../Lib/Library.php"><i class="fas fa-arrow-left"></i></a>
                </div>   

                <div class="GenreName">
                    <h1><?php echo $_REQUEST['genre'];?></h1>   
                </div> 
            </div>

            <div class="ListBook">
                <div class="nameList">
                    <span><?php echo $_REQUEST['genre'];?></span>
                </div>
                <div class="Items">
                <?php 
                    for($i = 0; $i < count($books); $i++){
                ?>
                    <div class="bookItem">
                        <div class="photo">
                            <a href="../book/book.php?id=<?php echo $books[$i]['id'];?>"><img src="../<?php echo  $books[$i]['img']?>" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat"><?php echo  $books[$i]['name']?></span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat"><?php echo  $books[$i]['FIO']?></span>
                        </div>
                    </div> 
                <?php
                    }
                ?>                    
                </div> 
            </div>  

            <div class="Text_section">
                <h3 class="paragraph">About genre "<?php echo $genre;?>"</h3>  
                <p class="text"><?php echo $description_genre['description'];?></p>
            </div>            
        </div>                 
    </main>                           

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