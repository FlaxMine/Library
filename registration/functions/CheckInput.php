<?php

    $errors = array();

    if(trim($data['email']) == '' and !filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors[0] = 'Не корректный email';      
    }else{$errors[0]=' ';}


    $link = mysqli_connect('localhost', 'root', '', 'library') or die("Ошибка " . mysqli_error($link));
    $a = $data['email'];
    $result = mysqli_query($link, "SELECT id_user FROM users WHERE email='$a'");
    $myrow = mysqli_fetch_array($result);

    if(!empty($myrow['id_user'])){
        $errors[0] = 'Пользователь с таким email уже существует';
    }
    
    if($data['password'] == ' '){
        $errors[1] = 'Введите пароль';
    }else{$errors[1] = ' ';}

    if($data['password_2'] != $data['password']){
        $errors[2] = 'Повторный пароль введен не верно!';
    }else{$errors[2] = ' ';}
    
    if($data['name'] == ''){
        $errors[3] = 'Введите имя';
    }else {$errors[3] = ' ';}

    if($data['fam'] == ''){
        $errors[4] = 'Введите фамилию';
    }else {$errors[4] = ' ';}
    
?>