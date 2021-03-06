<?php

    session_start();

    require "../database/connection.php";
    $link = ConnectionDB();


    $query_quantity_genres = "SELECT COUNT(genre) AS quantity_genres FROM genre";
    $result_quantity_genres = mysqli_query($link, $query_quantity_genres); 

    $quantity_genres = mysqli_fetch_array($result_quantity_genres);

    $query_genres = "SELECT * FROM genre";
    $result_query_genres= mysqli_query($link, $query_genres); 

    $all_id_genre = array();

    while($id_genre = mysqli_fetch_array($result_query_genres)){
        $all_id_genre[] = $id_genre;
    };

    $quantity_books_by_genres = array();

    for($i = 0; $i < count($all_id_genre); $i++){

        $id = intval($all_id_genre[$i]['0']);
        $query = "SELECT COUNT(id_book) AS quantity FROM (SELECT * FROM genre JOIN attribute on genre.id = attribute.id_genre) AS GENRES WHERE id_genre = $id";
        $result = mysqli_query($link, $query); 
        
        $quantity_books_by_genres[] = mysqli_fetch_array($result);
    }


    $query = "SELECT * FROM book JOIN author on book.id=author.id_author";
    $result = mysqli_query($link, $query);

    $books = array();

    while($myrow = mysqli_fetch_array($result)){
        $books[] =  $myrow;
    };

    $query2 = "SELECT count(id) as quantity FROM book";
    $result2 = mysqli_query($link, $query2);

    $quantity = mysqli_fetch_array($result2)
?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Library</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css"/>
    <link rel="stylesheet" href="../css/slider.css" type="text/css">

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/slick.min.js"></script>
    <script type="text/javascript" src="../js/slider_library.js"></script>
    

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
        <div class="main_body container">
            <h1>Library</h1> 
            <div class="ListBook">
                <div class="nameList">
                    <span>Popular genres</span>
                </div>
                <div class="GenreItems">
                    <div class="Item">
                        <div class="item_background">
                            <b>Fantasy</b>
                            <p><?php echo $quantity_books_by_genres[1]['quantity'];?> <i class="fas fa-book"></i></p>
                        </div>
                        <div class="img_color">
                            <img src="../img/popular_genre_img/rocket.png" alt="">
                        </div>
                    </div> 
                    
                    <div class="Item">
                        <div class="item_background">
                            <b>Business books</b>
                            <p><?php echo $quantity_books_by_genres[0]['quantity'];?> <i class="fas fa-book"></i></p>
                        </div>
                        <div class="img_color">
                            <img src="../img/popular_genre_img/purse.png" alt="">
                        </div>
                    </div>

                    <div class="Item">
                        <div class="item_background">
                            <b>Romance novels</b>
                            <p><?php echo $quantity_books_by_genres[2]['quantity'];?> <i class="fas fa-book"></i></p>
                        </div>
                        <div class="img_color">
                            <img src="../img/popular_genre_img/heart.png" alt="">
                        </div>
                    </div>

                    <div class="Item">
                        <div class="item_background">
                            <b>Psychology books</b>
                            <p><?php echo $quantity_books_by_genres[4]['quantity'];?> <i class="fas fa-book"></i></p>
                        </div>
                        <div class="img_color">
                            <img src="../img/popular_genre_img/brain.png" alt="">
                        </div>
                    </div>

                    <div class="Item">
                        <div class="item_background">
                            <b>DataBase</b>
                            <p><?php echo $quantity_books_by_genres[3]['quantity'];?> <i class="fas fa-book"></i></p>
                        </div>
                        <div class="img_color">
                            <img src="../img/popular_genre_img/database.jpg" alt="">
                        </div>
                    </div>

                </div> 
            </div>
        </div>

        <div class="main_content container">
            <div class="left_part">
                <div class="Genre">Genres</div>
                <span class="quantity_genre"><?php echo $quantity_genres['quantity_genres'];?> genres</span>

                <div class="items_genre">   
                <?php
                    for($i = 0; $i < count($quantity_books_by_genres); $i++){
                ?>
                    <a href="../Books/books.php?genre=<?php echo $all_id_genre[$i]['genre'];?>">
                        <div class="item_lefpart">
                            <span><?php echo $all_id_genre[$i]['genre'];?></span>
                            <span><?php echo $quantity_books_by_genres[$i]['quantity'];?></span>
                        </div>
                    </a>
                <?php
                    }
                ?>       
                </div>         
            </div>

            <div class="right_part">
                <div class="ListBook">
                    <div class="nameList">
                        <div class="nameList2">
                            <div class="location">
                                <span>All books</span> 
                                <p class="inf"><?php echo $quantity['quantity']; ?> books</p>  
                            </div>
                            <div class="location">
                                <h5><a href="#">All books ></a></h5>
                            </div>
                        </div>                                
                    </div>
                    <div class="box_slider">
                        <div class="Items items2">
                            <?php
                                for($i = 0; $i < count($books); $i++){
                            ?>
                                <div class="bookItem">
                                    <div class="photo">
                                        <a href="../book/book.php?id=<?php echo $books[$i]['id'];?>"><img src="../<?php echo $books[$i]['img'];?>" alt="" width="124" height="196"></a>
                                    </div>
                                    <div class="name repeat">
                                        <span class="repeat"><?php echo $books[$i]['1'];?></span>
                                    </div>
                                    <div class="autor repeat">
                                        <span class="repeat"><?php echo $books[$i]['FIO'];?></span>
                                    </div>
                                    <?php 
                                    if(!empty($_SESSION['logged_user']) && $_SESSION['logged_user'] == "admin@gmail.com"){
                                    ?>
                                        <div class="admin_buttons">
                                            <div class="delete_button">
                                                <a href="../admin/delete.php?id=<?php echo $books[$i]['id'];?>"><input class="button_admin" type="submit" name="do_delete" value="Delete"></a>
                                            </div>

                                            <div class="update_button">
                                                <a href="../admin/update.php?id=<?php echo $books[$i]['id'];?>"><input class="button_admin" type="submit" name="do_update" value="Update"></a>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                </div> 
                            <?php
                                }
                            ?>     
                        </div>
                    </div>                     
                </div>

                <div class="Text_Container">
                    <h2 class="main_paragraph">About the catalog of books</h2>

                    <article class="Text_arcticle width_article">
                        <section class="Text_section">
                            <p class="text">
                                Every day, new items arrive at the LibBook library. 
                                These are books and audiobooks.of all genres: classic and modern literature, reprints and 
                                new works of popular authors. Our catalog is a branchy tree. 
                                Detectives, love stories, fantasy, science fiction, non-fiction and
                                Business books are the most popular genres. Each section contains
                                several categories that distribute works by topics and clarify
                                search for the right books.
                            </p>

                            <p class="text">
                                In the section of modern prose you will meet Nesbyo and Akunin, Barnes and Tokarev,
                                Pelevin and Sorokina - the whole range of writers who create literature
                                Today. Masterpieces of Dostoevsky, Tolstoy, Bunin and Kuprin - in the section
                                classic literature. Many of the classic novels and short stories can
                                read for free
                            </p>

                            <p class="text">  
                                If you have questions to yourself, if you want to change or adjust
                                relationship with loved ones - refer to books on psychology. Thousands of readers
                                Every day they find information that helps to improve the quality of life.
                                It is convenient to read these e-books in any situation, noting useful thoughts.
                                and going back to the point in his notes.
                            </p>
                        </section>  

                        <section class="Text_section">
                            <p class="text">
                                About how to put things in order, all in time, remember important,
                                present and sell, plan and count, tell the best books
                                Russian business publishing houses: Mann, Ivanov and Ferber, Alpina
                                Publisher "," Eksmo "," Olimp-Business "," Peter ". These books help improve
                                personal effectiveness and the work of the whole team.                  

                            </p>    

                            <p class="text">      
                                What to read to have fun? Go to the section of detectives, love
                                novels, fiction and fantasy. There you will find new items and classics favorite
                                genres. In the LibBook, everyone can choose a book they like, even a child.
                                Fairy tales, tales, teaching aids and instructive stories are suitable for
                                reading with family. You can read and listen to books online on the site.
                                or in a mobile application, even without the Internet.
                            </p>
                        </section>
                    </article>
                </div>
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