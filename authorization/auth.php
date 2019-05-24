<?php

    require "../database/connection.php";
    $link = ConnectionDB();
    session_start();

    $data = $_POST;
    $errors = array();
    

    if(isset($data['do_signin'])){
        if(($data['email'] != '') or ($data['password'] != '')){

            $email = $data['email'];
            $password = $data['password'];
            $user = mysqli_query($link, "SELECT email, password FROM users WHERE email='$email'");
            $myrow = mysqli_fetch_array($user);

            if(!empty($myrow['email'])){
                if(password_verify($data['password'], $myrow['password'])){
                    $_SESSION['logged_user'] = $myrow['email'];
                    if(!empty($_SESSION['logged_user'])){
                        header("Location: ../index.php");
                    }                 
                }
                else{
                    $errors[] = 'Логин или пароль введен неверно!';
                }
            }
            else{
                $errors[] = 'Пользователь с таким email не существует!';
            }
        }else{$errors[] = 'Заполните поля';}        
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Электронная библиотека</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../registration/reg.css">

</head>
<body>
    <header>
        <div class="container">
            <div class="main_header">
                <div class="header">

                    <div class="logo">
                        <a href="../index.html"><img src="../img/logo/Logo.PNG" alt=""></a>
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
                    <a href="auth.html" class="log_in">Войти |</a>
                    <a href="../registration/registration.php" class="sign_in">Зарегистрироваться</a>
                </div>

            </div>
        </div>
    </header>

    <div class="authorization container">
        <div class="auth">
            <h1>Вход</h1><br>
        </div>

        <form method="POST">
            <div class="email">
                <input type="text" name="email" placeholder="Введите почту" value="<?php echo @$data['email'];?>">
            </div>

            <div class="password">
                <input type="password" name="password" placeholder="Пароль">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.array_shift($errors).'</div>';} ?>
            </div>

            <div>
                <input class="button" type="submit" name="do_signin" value="Войти">
            </div>
        </form>
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