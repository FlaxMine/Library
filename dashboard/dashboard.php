<?php
    session_start();

    require "../database/connection.php";
    $link = ConnectionDB();

    require "../functionsPHP/getBooksByGenre.php";

    $fantasy = getBooks($link, 'Fantasy');
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
    <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css"/>

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="../js/slick.min.js"></script>
    <script type="text/javascript" src="../js/slider.js"></script>

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
                        <input class="input_search" type="text" placeholder="Книга или автор"> 
                    </div>
    
                    <div class="header_menu">
                        <ul class="menu_list">
                            <a href="dashboard.php"><li class="menu_item">What to read</li></a>
                            <a href="../Lib/Library.php"><li class="menu_item">Library</li></a>  
                        </ul>
                    </div>
                </div> 

                <div class="auth">
                    <a href="../authorization/auth.php" class="log_in">Sign in |</a>
                    <a href="../registration/registration.php" class="sign_in">Sing up</a>
                </div>

            </div>
        </div>
    </header>

    <section>
        <div class="main_body container">
            <h1>What to read</h1> 
           
            <div class="ListBook">
                <div class="nameList">
                    <p class="repeat">Fantasy</p>
                    <span>Alternative history</span>
                </div>
                <div class="Items">
                    <?php
                        for($i = 0; $i < count($fantasy); $i++){
                    ?>
                        <div class="bookItem">
                            <div class="photo">
                                <a href="../book/book.php?id=<?php echo $fantasy[$i]['id'];?>"><img src="../<?php echo $fantasy[$i]['img'];?>" alt="" width="124" height="196"></a>
                            </div>
                            <div class="name repeat">
                                <span class="repeat"><?php echo $fantasy[$i]['name'];?></span>
                            </div>
                            <div class="autor repeat">
                                <span class="repeat"><?php echo $fantasy[$i]['FIO'];?></span>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div> 
            </div>

            <div class="ListBook">
                <div class="nameList">
                    <p class="repeat">Novelties, Psychology</p>
                    <span>Psychology: new genre</span>
                </div>
                <div class="Items">
                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  
                    
                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 
    
                </div> 
            </div>

            <div class="ListBook">
                <div class="nameList">
                    <p class="repeat">Computer literature</p>
                    <span>Database</span>
                </div>
                <div class="Items">
                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  
                    
                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div>  

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 

                    <div class="bookItem">
                        <div class="photo">
                            <a href="#"><img src="../img/book/225f8718-61c1-4ae3-a5ad-5c33193cc98c.jpg" alt="" width="124" height="196"></a>
                        </div>
                        <div class="name repeat">
                            <span class="repeat">Айвенго</span>
                        </div>
                        <div class="autor repeat">
                            <span class="repeat">Вальтер Скотт</span>
                        </div>
                    </div> 
    
                </div> 
            </div>
                  
        </div>
    </section>

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

