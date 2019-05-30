<?php

    session_start();

    $errors = "";
    $successfully = "";

    if(isset($_REQUEST['Download'])){

        if(!empty($_FILES['picture'])){
            $types = array('image/png', 'image/jpeg', 'image/jpg');
            if (in_array($_FILES['picture']['type'][0], $types) && in_array($_FILES['picture']['type'][1], $types)){
                $max_size = 802400;
                if ($_FILES['picture']['size'][0] < $max_size && $_FILES['picture']['size'][1] < $max_size){

                    $tmp_name_0 = $_FILES['picture']['tmp_name'][0];
                    $tmp_name_1 = $_FILES['picture']['tmp_name'][1];
                    $name_file_0 = $_FILES['picture']['name'][0];
                    $name_file_1 = $_FILES['picture']['name'][1];

                    $time = time();
        
                    if(move_uploaded_file($tmp_name_0, "../img/book/$time" .$name_file_0) 
                                    && move_uploaded_file($tmp_name_1, "../img/author_img/$time" .$name_file_1)){
                        $successfully = "Files was uploaded successfully!";
                    }
                    else { $errors = "Error loading!";}
                }
                else { $errors = "File size too large!"; }
            }
            else { $errors = "Not valid file type!"; }       
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Library</title>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../registration/reg.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="main_header">
                <div class="header">

                    <div class="logo">
                        <a href="index.php"><img src="../img/logo/Logo.PNG" alt=""></a>
                    </div>
    
                    <div class="search">
                        <input class="input_search" type="text" placeholder="Book or author"> 
                    </div>
    
                    <div class="header_menu">
                        <ul class="menu_list">
                            <a href="dashboard/dashboard.php"><li class="menu_item">What to read</li></a>
                            <a href="Lib/Library.php"><li class="menu_item">Library</li></a>   
                        </ul>
                    </div>
                </div> 

                <div class="auth">
                    <?php
                        if(empty($_SESSION['logged_user'])){
                    ?>
                        <a href="authorization/auth.php" class="log_in">Sign in |</a>
                        <a href="registration/registration.php" class="sign_in">Sing up</a>
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

    <div class="admin container">

        <div class="photo_load">
            <form enctype="multipart/form-data" multipart="" action="adminEdit.php" method="POST"> 
                <div class="picture">
                    <input name="picture[]" type="file" multiple />
                </div>
                <div class="Download">
                    <input type="submit" class="button" name="Download" value="Download" />   
                </div>   
            </form>
            <div class="error">
                <?php 
                    if(!empty($errors)){
                        echo $errors;
                    }else {echo $successfully; }
                ?>
            </div>
        </div><br>

        <form action="registration.php" method="POST">
            <div class="admin_edit">
                <div class="nameBook">
                    <input type="text" class="input_search" name="nameBook" placeholder="NameBook">                   
                </div>     
                
                <div class="authorBook">
                    <input type="text" class="input_search" name="authorBook" placeholder="authorBook">
                </div>

                <div class="genreBook">
                    <input type="text" class="input_search" name="genreBook" placeholder="genreBook">
                </div>

                <div class="DateWrite">
                    <input type="text" class="input_search" name="DateWrite" placeholder="DateWrite">
                </div>

                <div class="YearPublish">
                    <input type="text" class="input_search" name="YearPublish" placeholder="YearPublish">
                </div>

                <div class="QuantityPage">
                    <input type="text" class="input_search" name="QuantityPage" placeholder="QuantityPage">
                </div>

                <div class="aboutBook">
                    <p>About Book<Br>
                    <textarea name="aboutBook" cols="40" rows="10"></textarea></p>
                </div>

                <div class="aboutAuthor">
                    <p>About Author<Br>
                    <textarea name="aboutAuthor" cols="40" rows="10"></textarea></p>
                </div>

                <div class="Add">
                    <input type="submit" class="button add" name="QuantityPage" placeholder="QuantityPage">
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