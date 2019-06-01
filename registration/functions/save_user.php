<?php

    $first_name = mysqli_real_escape_string($link, $_POST['name']);
    $second_name = mysqli_real_escape_string($link, $_POST['fam']);

    $email = mysqli_real_escape_string($link, $_POST['email']);
    $email = trim($email);

    $password = mysqli_real_escape_string($link, $_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $result = mysqli_query($link, "INSERT INTO users (first_name, second_name, password, email) 
            VALUES ('$first_name', '$second_name', '$password', '$email')");

    
    if($result == TRUE){
        header('Location: ../index.php');
        exit;
    }

?>