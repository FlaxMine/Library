<?php

    $first_name = $_POST['name'];
    $second_name = $_POST['fam'];

    $email = $_POST['email'];
    $email = trim($email);

    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $result = mysqli_query($link, "INSERT INTO users (first_name, second_name, password, email) 
            VALUES ('$first_name', '$second_name', '$password', '$email')");

    
    if($result == TRUE){
        header('Location: ../index.php');
        exit;
    }

?>