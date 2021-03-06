<?php

    require "../database/connection.php";
    $link = ConnectionDB();

    $data = $_REQUEST;
    if(isset($data['do_signup'])){

        include 'functions/CheckInput.php';
        require "functions/CheckArray.php";

        if(check_array($errors)){
            require "functions/save_user.php";
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="reg.css">
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
                    <a href="../authorization/auth.php" class="log_in">Sign in |</a>
                    <a href="registration.php" class="sign_in">Sign up</a>
                </div>

            </div>
        </div>
    </header>

    <div class="registration container">
        <div class="resistr">
            <h1>Registration</h1><br>
        </div>
        <form action="registration.php" method="POST">
            <div class="name">
                <input type="text" class="input_search" name="name" placeholder="Name" value = "<?php echo @$data['name'];?>">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[3].'</div>';} ?> 
            </div>

             <div class="fam">
                <input type="text" class="input_search" name="fam" placeholder="Familia" value = "<?php echo @$data['fam'];?>">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[4].'</div>';} ?>
            </div>

             <div class="email">
                <input type="text" class="input_search" name="email" placeholder="Email" value="<?php echo @$data['email'];?>">
                <?php  if(!empty($errors)) { echo '<div style="color: red>'.$errors[0].'</div>';} ?>   
            </div>

             <div class="password">
                <input type="password"  class="input_search" name="password" placeholder="Password">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[1].'</div>';} ?>
            </div>

             <div class="password">
                <input type="password" class="input_search" name="password_2" placeholder="Confirm password">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[2].'</div>';} ?>
            </div>   

            <div>
                <input class="button" type="submit" name="do_signup" value="Sign up">
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