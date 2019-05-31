<?php


    require "../database/connection.php";
    $link = ConnectionDB();

    $id = intval($_REQUEST['id']);

    $query_delete_book = "DELETE FROM book WHERE id = $id";
    $query_delete_author = "DELETE FROM author WHERE id_author = $id";


    $result_delete_book = mysqli_query($link, $query_delete_book);
    $result_delete_author = mysqli_query($link, $query_delete_author);

    if($result_delete_book == TRUE && $result_delete_author == TRUE){
        header("Location: ../index.php");
        exit;
    }

?>