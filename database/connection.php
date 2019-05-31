<?php

    function ConnectionDB(){
        $link = mysqli_connect('localhost', 'root', '', 'library');
        mysqli_set_charset($link, "utf8");
        return $link;
    }
?>
 
