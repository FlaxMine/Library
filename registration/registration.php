<?php

    require "../database/connection.php";
    $link = ConnectionDB();

    $data = $_REQUEST;
    if(isset($data['do_signup'])){

        include 'CheckInput.php';
        require "CheckArray.php";

        if(check_array($errors)){
            require "save_user.php";
        }
        
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
    <link rel="stylesheet" href="reg.css">
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
                    <a href="../authorization/auth.html" class="log_in">Войти |</a>
                    <a href="registration.html" class="sign_in">Зарегистрироваться</a>
                </div>

            </div>
        </div>
    </header>

    <div class="registration container">
        <div class="resistr">
            <h1>Регистрация</h1><br>
        </div>
        <form action="registration.php" method="POST">
            <div class="name">
                <input type="text" name="name" placeholder="Введите Имя" value = "<?php echo @$data['name'];?>">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[3].'</div>';} ?> 
            </div>

             <div class="fam">
                <input type="text" name="fam" placeholder="Введите Фамилию" value = "<?php echo @$data['fam'];?>">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[4].'</div>';} ?>
            </div>

             <div class="email">
                <input type="text" name="email" placeholder="Введите почту" value="<?php echo @$data['email'];?>">
                <?php  if(!empty($errors)) { echo '<div style="color: red>'.$errors[0].'</div>';} ?>   
            </div>

             <div class="password">
                <input type="password" name="password" placeholder="Пароль">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[1].'</div>';} ?>
            </div>

             <div class="password">
                <input type="password" name="password_2" placeholder="Повторите пароль">
                <?php  if(!empty($errors)) { echo '<div style="color: red">'.$errors[2].'</div>';} ?>
            </div>   

            <div>
                <input class="button" type="submit" name="do_signup" value="Зарегистрироваться">
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