<?php

    function getBooks($link, $genre){

        $query_get_id_genre = "SELECT id FROM genre WHERE genre='$genre'";

        $result_genre = mysqli_query($link, $query_get_id_genre);
        $id_genre = mysqli_fetch_array($result_genre);

        $id = intval($id_genre['id']);

        $query = "SELECT * FROM author JOIN 
                    (SELECT * FROM book JOIN 
                        (SELECT id_book FROM attribute WHERE id_genre = $id) AS ID
                        on book.id = id_book) AS ID_AUTHOR
                    on author.id_author = id";

        $result = mysqli_query($link, $query);

        $books = array();

        while($myrow = mysqli_fetch_array($result)){
            $books[] =  $myrow;
        };

        return $books;
    }

?>