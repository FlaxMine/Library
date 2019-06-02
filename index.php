<?php

    session_start();

    require "database/connection.php";
    $link = ConnectionDB();

    $books = array();
    $author = array();

    $query2 = "SELECT * from author_book JOIN book on author_book.id_author = book.id";
    $result_query2 = mysqli_query($link, $query2);

    while($myrow = mysqli_fetch_array($result_query2)){
        $books[] =  $myrow;
    };

    $query = "SELECT * from author_book JOIN author on author_book.id_author = author.id_author";
    $result_query = mysqli_query($link, $query);

    while($myrow = mysqli_fetch_array($result_query)){
        $author[] =  $myrow;
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Library</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    <link rel="stylesheet" href="css/slider.css" type="text/css">

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>


</head>
<body>
    <header>
        <div class="container">
            <div class="main_header">
                <div class="header">

                    <div class="logo">
                        <a href="index.php"><img src="img/logo/Logo.PNG" alt=""></a>
                    </div>
    
                    <div class="search">
                        <input class="input_search" type="text" placeholder="Book or author"> 
                    </div>
    
                    <div class="header_menu">
                        <ul class="menu_list">
                            <a href="dashboard/dashboard.php"><li class="menu_item">What to read</li></a>
                            <a href="Lib/Library.php"><li class="menu_item">Library</li></a>   
                        </ul>
                    </div>
                </div> 

                <div class="auth">
                    <?php
                        if(empty($_SESSION['logged_user'])){
                    ?>
                        <a href="authorization/auth.php" class="log_in">Sign in |</a>
                        <a href="registration/registration.php" class="sign_in">Sing up</a>
                    <?php
                        }
                        else{
                    ?>
                        <span class="logged_user"><?php echo $_SESSION['logged_user']; ?><a href="logout/logout.php"> | Выйти</a></span>
                    <?php
                        }
                    ?>
                    
                </div>

            </div>
        </div>
    </header>

    <main>
        <section>       
            <div class="line container"></div>
    
            <div class="Title container">
                <h1>
                    LibBook - read <br>
                    books with<br>
                    pleasuer
                </h1>
            </div>
    
            <ul class="menu_list_new container menu_list">
                <li class="item">
                    <i class="fas fa-book"></i><br>
                    <span>
                        <b>181 &nbsp;000</b>
                        <br> books
                    </span>
                </li>
    
                <li class="item">
                    <i class="far fa-star"></i><br>
                    <span>
                        <b>+ 2 &nbsp;000</b> new books
                        <br> every month
                    </span>
                </li>
    
                <li class="item">
                    <i class="fas fa-puzzle-piece"></i><br>
                    <span>
                        <b>Selection</b>
                        <br>and recommendations
                    </span> 
                </li>
    
                <li class="item">
                    <i class="fas fa-wifi"></i><br>
                    <span>
                        <b>Online</b>
                        <br>or offline
                    </span> 
                </li>
            </ul>
    
            <div class="line container"></div>
    
            <div class="main_body container">           
                <div class="ListBook">
                    <div class="nameList">
                        <span>We add the best news</span>                 
                        <p class="inf">2000 books every day. Fashion authors and exclusive publishers</p>           
                    </div>
                    <div class="box_slider">
                        <div class="Items">
                        <?php 
                            if(!empty($_SESSION['logged_user']) && $_SESSION['logged_user'] == "admin@gmail.com"){
                        ?>
                            <div class="bookAdd">
                                <div class="photo">
                                    <a href="admin/add.php"><img src="img/plus.jpg" width="124" height="196"></i></a>
                                </div>
                            </div>
                        <?php       
                            }
                        ?>
                            <?php
                                for($i = 0; $i < count($books); $i++){
                            ?>
                                <div class="bookItem">
                                    <div class="photo">
                                        <a href="book/book.php?id=<?php echo $books[$i]['id'];?>"><img src="<?php echo $books[$i]['img'];?>" alt="" width="124" height="196"></a>
                                    </div>
                                    <div class="name repeat">
                                        <span class="repeat"><?php echo $books[$i]['1'];?></span>
                                    </div>
                                    <div class="autor repeat">
                                        <span class="repeat"><?php echo $author[$i]['FIO'];?></span>
                                    </div>

                                    <?php 
                                        if(!empty($_SESSION['logged_user']) && $_SESSION['logged_user'] == "admin@gmail.com"){
                                    ?>
                                       <div class="admin_buttons">
                                            <div class="delete_button">
                                                <a href="admin/delete.php?id=<?php echo $books[$i]['id'];?>"><input class="button_admin" type="submit" name="do_delete" value="Delete"></a>
                                            </div>

                                            <div class="update_button">
                                                <a href="admin/update.php?id=<?php echo $books[$i]['id'];?>"><input class="button_admin" type="submit" name="do_update" value="Update"></a>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    </div>                                            
                            <?php
                                }
                            ?>    
                        </div> 
                    </div>
                </div>
    
                <div class="ListBook">
                    <div class="nameList">
                        <span>Tens of thousands of free books</span>                 
                        <p class="inf">Native classics and time-tested bestsellers are always free</p>           
                    </div>
                    <div class="box_slider">
                        <div class="Items">
                        <?php 
                            if(!empty($_SESSION['logged_user']) && $_SESSION['logged_user'] == "admin@gmail.com"){
                        ?>
                            <div class="bookAdd">
                                <div class="photo">
                                    <a href="admin/add.php"><img src="img/plus.jpg" width="124" height="196"></i></a>
                                </div>
                            </div>
                        <?php       
                            }
                        ?>
                            <?php
                                for($i = 0; $i < count($books); $i++){
                            ?>
                                <div class="bookItem">
                                    <div class="photo">
                                        <a href="book/book.php?id=<?php echo $books[$i]['id'];?>"><img src="<?php echo $books[$i]['img'];?>" alt="" width="124" height="196"></a>
                                    </div>
                                    <div class="name repeat">
                                        <span class="repeat"><?php echo $books[$i]['1'];?></span>
                                    </div>
                                    <div class="autor repeat">
                                        <span class="repeat"><?php echo $author[$i]['FIO'];?></span>
                                    </div>

                                    <?php 
                                        if(!empty($_SESSION['logged_user']) && $_SESSION['logged_user'] == "admin@gmail.com"){
                                    ?>
                                       <div class="admin_buttons">
                                            <div class="delete_button">
                                                <a href="admin/delete.php?id=<?php echo $books[$i]['id'];?>"><input class="button_admin" type="submit" name="do_delete" value="Delete"></a>
                                            </div>

                                            <div class="update_button">
                                                <a href="admin/update.php?id=<?php echo $books[$i]['id'];?>"><input class="button_admin" type="submit" name="do_update" value="Update"></a>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    </div>                                            
                            <?php
                                }
                            ?>    
                        </div> 
                    </div>
                </div>               
            </div>
        </section>

        <div class="Text_Container container">
            <h2 class="main_paragraph">Read books anywhere</h2>
            <article class="Text_arcticle">
                <section class="Text_section">
                    <h3 class="paragraph">Novelties, classics and bestsellers</h3>
                    <p class="text">
                        LibBook - the largest library of electronic books
                        and audiobooks in Russian by subscription.
                        More than 150,000 works of all genres in the mobile application and on the website:
                        detective stories, fantasy, fantasy, romance novels, books on business, psychology,
                        children, modern and classic literature. New items come in every day -
                        as in a bookstore, only more convenient. Some e-books in the library
                        free, you can read them without a subscription. These are classic pieces from school.
                        programs and modern literature novice authors.
                    </p>

                    <h3 class="paragraph">The entire collection in the application</h3>
                    <p class="text">
                        We are glad to see you on the site - here you can read and listen to books.
                        online. But more convenient - in the application. The smartphone is always at hand, which means
                        with you all the right books. Mobile application for iOS and Android -
                        This is your collection in the smartphone and on the tablet. Read in electronic
                        LibBook library is possible in any situation, even without a network. For this
                        open the desired book in reading mode with the Internet turned on -
                        so it will remain in the device’s memory, and in the future, access to the network will not be
                        will need. Store as many books as you like in your library.
                    </p>
                </section>

                <section class="Text_section">
                    <h3 class="paragraph">Recommend books</h3>
                    <p class="text">
                        Selections in LibBook - assistants in the selection of suitable works by mood,
                        topic, season, popularity or expert assessment. We select the best books.
                        and audiobooks in our electronic library so that you don’t have to
                        spend time searching. We talk about the winners of book awards and
                        winners of contests. We suggest what is fashionable and what is little known
                        what to read on vacation, in winter and summer, on the road and at home. Big choice
                        good books - in the "What to read" on the website and in the application.
                    </p>

                    <h3 class="paragraph">Nothing is lost</h3>
                    <p class="text">
                        Website libbook.ru and mobile applications on your devices - this is one
                        whole. The entire library and reading data are synchronized every minute,
                        therefore, you can start reading on your smartphone on the way to work, and continue -
                        from the tablet, sitting at home on the couch. At the same time notes, quotes and bookmarks -
                        A useful addition for a thoughtful reader - also tolerated. All important
                        ideas, capacious phrases and instructions that you highlight are stored in the section
                        notes. The site is available upload all notes to a text document.
                    </p>
                </section>
            </article>
        </div>
        
    </main>
    

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