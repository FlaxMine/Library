<?php

    session_start();

    require "../database/connection.php";
    $link = ConnectionDB();

    ///////////////////  GET INFORMATION FOR FIELDS ///////////////////

    $id_book = empty($_REQUEST['id']) ? null : intval($_REQUEST['id']);
    if($id_book != NULL){

        $query_get_id_genre = "SELECT id_genre FROM attribute WHERE id_book =" .intval($id_book);
        $reuslt_get_id_genre = mysqli_query($link, $query_get_id_genre);
        $id_genre = mysqli_fetch_array($reuslt_get_id_genre);
        $id = $id_genre['id_genre'];
    
        $query_get_genre = "SELECT genre FROM genre WHERE id=" .intval($id);
        $result_get_genre = mysqli_query($link, $query_get_genre);
        $genre_result = mysqli_fetch_array($result_get_genre);
        $genre = $genre_result['genre'];
    
        $query_book_author = "SELECT * FROM (SELECT * FROM book JOIN author on book.id = author.id_author) AS book_author WHERE id=" .intval($id_book);
        $result_query_book_author = mysqli_query($link, $query_book_author);
        $get_book_author = mysqli_fetch_array($result_query_book_author);
    
        $query_about_author = "SELECT about_author FROM information_author WHERE id_author =" .intval($id_book);
        $result_query_about_author = mysqli_query($link, $query_about_author);
        $get_about_author = mysqli_fetch_array($result_query_about_author);
    
        $query_detailed_information = "SELECT * FROM detailed_information WHERE id_book =" .intval($id_book);
        $result_query_detailed_information = mysqli_query($link, $query_detailed_information);
        $get_detailed_information = mysqli_fetch_array($result_query_detailed_information);
    }

    ///////////////////  EDIT INFORMATION ///////////////////

    if(isset($_REQUEST['Update'])){

        $id_book_field = intval($_REQUEST['id_book_field']);
        $nameBook = mysqli_real_escape_string($link, $_REQUEST['nameBook']);
        $aboutBook = mysqli_real_escape_string($link, $_REQUEST['aboutBook']);
        //$BookImg = $_REQUEST['BookImg'];

        $authorBook = mysqli_real_escape_string($link, $_REQUEST['authorBook']);
        $authorYear = intval($_REQUEST['authorYear']);
       //$AuthorImg = $_REQUEST['AuthorImg'];

        $aboutAuthor = mysqli_real_escape_string($link, $_REQUEST['aboutAuthor']);

        $genreBook = $_REQUEST['genreBook'];

        $DateWrite = intval($_REQUEST['DateWrite']);
        $YearPublish = intval($_REQUEST['YearPublish']);
        $QuantityPage = intval($_REQUEST['QuantityPage']);  

        $query_update_book = "UPDATE book SET name = '$nameBook' WHERE id=" .intval($id_book_field);
        $result_query_update_book = mysqli_query($link, $query_update_book);

        $query_update_FIOAuthor = "UPDATE author SET FIO = '$authorBook' WHERE id_author=" .intval($id_book_field);
        $result_query_update_FIOAuthor = mysqli_query($link, $query_update_FIOAuthor);

        $query_update_aboutAuthor = "UPDATE information_author SET about_author = '$aboutAuthor' WHERE id_author=" . intval($id_book_field);
        $result_update_aboutAuthor = mysqli_query($link, $query_update_aboutAuthor);

        $query_detailed_information = "UPDATE detailed_information SET year_edition = '$YearPublish', year_write = '$DateWrite',
                                            quantity_page = '$QuantityPage', description = '$aboutBook' WHERE id_book =" .intval($id_book_field);
        $result_query_detailed_information = mysqli_query($link, $query_detailed_information);

        if($result_query_update_book){
            header("Location: ../index.php");
        }
        else { header("Location: update.php?id=" .intval($id_book_field)); }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Library</title>

    <link rel="stylesheet" href="../registration/reg.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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

        <div class="admin container">

            <form action="update.php" method="POST">
                <div class="admin_edit">
                    <div class="nameBook">
                        <input type="text" class="input_search" name="nameBook" placeholder="NameBook" value="<?php echo $get_book_author['name'];?>">                   
                    </div>     
                    
                    <div class="authorBook">
                        <input type="text" class="input_search" name="authorBook" placeholder="authorBook" value="<?php echo $get_book_author['FIO'];?>">
                    </div>

                    <div class="authorYear">
                        <input type="text" class="input_search" name="authorYear" placeholder="authorYear" value="<?php echo $get_book_author['year'];?>">
                    </div>

                    <div class="genreBook">
                        <input type="text" class="input_search" name="genreBook" placeholder="genreBook" value="<?php echo $genre;?>">
                    </div>

                    <div class="DateWrite">
                        <input type="text" class="input_search" name="DateWrite" placeholder="DateWrite" value="<?php echo $get_detailed_information['year_write'];?>">
                    </div>

                    <div class="YearPublish">
                        <input type="text" class="input_search" name="YearPublish" placeholder="YearPublish" value="<?php echo $get_detailed_information['year_edition'];?>">
                    </div>

                    <div class="QuantityPage">
                        <input type="text" class="input_search" name="QuantityPage" placeholder="QuantityPage" value="<?php echo $get_detailed_information['quantity_page'];?>">
                    </div>    
                    
                    <div class="QuantityPage">
                        <input type="hidden" class="input_search" name="id_book_field" placeholder="id_book_field" value="<?php echo $id_book;?>">
                    </div> 

                    <div class="aboutBook">
                        <p>About Book<Br>
                        <textarea name="aboutBook" cols="40" rows="10"><?php echo $get_detailed_information['description'];?></textarea></p>
                    </div>

                    <div class="aboutAuthor">
                        <p>About Author<Br>
                        <textarea name="aboutAuthor" cols="40" rows="10"><?php echo $get_about_author['about_author'];?></textarea></p>
                    </div>

                    <div class="Update">
                        <input type="submit" class="button add" name="Update" placeholder="Edit" value="Edit">
                    </div>
                </div>
            </form>
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