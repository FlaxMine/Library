<?php

    session_start();

    if(isset($data['Download'])){

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
                    <input type="submit" class="Download" name="Download" value="Download" />
                </div>             
            </form>
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
                    <textarea name="aboutBook" cols="40" rows="7"></textarea></p>
                </div>

                <div class="aboutAuthor">
                    <p>About Author<Br>
                    <textarea name="aboutAuthor" cols="40" rows="7"></textarea></p>
                </div>

                <div class="Add">
                    <input type="submit" class="input_search" name="QuantityPage" placeholder="QuantityPage">
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