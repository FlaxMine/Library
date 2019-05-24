<?php

    function ConnectionDB(){
        $link = mysqli_connect('localhost', 'root', '', 'library') or die("Ошибка " . mysqli_error($link));
        mysqli_set_charset($link, "utf8");
        return $link;
    }
?>
 
