<!doctype html>
<html lang="en">

<?php
require_once "db_connection.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeopardy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php 
    include "./navbar.php";
    ?>

    <?php
       if(isset($_SESSION['email']))   // COOKIES
       {   
    ?>

    <div class="container bg-image" style="background-image: url('styles/bg.jpg');
            height: 35vh; background-size: cover; background-position: center; position: relative; max-width:100%">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="d-flex flex-column" role="search" style="text-align:center; padding: 11vh 0;" method='post' action='search.php'>
                    <h1 class="p-3">
                        <input class="form-control" type="search" name='search-content' placeholder="Search for Jeopardy Games"
                            aria-label="Search" autofocus >
                    </h1>
                    <p class="p-3" style="text-align:center;">
                        <input class="btn btn-primary btn-lg" type="submit" value='Search'>
                    </p>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <?php 
            if ($_GET['search'] != null){
            ?>
            <div class="col custom-col">
                <h1>Results</h1>
                <div class="list-group">
            <?php
                $content = $_GET['search'];
                $txt = "SELECT * FROM `jeopardy_games` WHERE 
                `title` LIKE '%$content%' 
                OR `author` LIKE '%$content%' 
                OR `category` LIKE '%$content%'
                OR `description` LIKE '%$content%'
                ;";
                $result = $db->query($txt);
                while($row = $result->fetch()){
                    $title = $row['title'];
                    $category = $row['category'];
                    $description = $row['description'];
                    $author = $row['author'];
                ?>
                <div class="container" id="function">
                        <label type="text" class="list-group-item list-group-item-action" aria-current="true" > 
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo $title;?></h5>
                                <small><?php echo $category?></small>
                            </div>
                            <p class="mb-1"><?php echo $description?></p>
                            <small><?php echo $author?></small>
                        </label>
                    
                        <div class="row">
                            <div class="col">
                            <?php
                                if ($author == $_SESSION['first_name'] . " " . $_SESSION['last_name']){
                            ?>
                                <form action = 'delete-handler.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <input type='submit' class="btn btn-danger" name='<?php $question_id ?>' value='x'/>
                                </form>
                            
                            <?php
                                }
                            ?>
                            </div>
                            <div class="col">
                                <form action = 'edit-handler.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <input type='submit' class="btn btn-primary" name='<?php $question_id ?>' value='edit'/>
                                </form>
                            </div>
                            <div class="col">
                                <form action = 'play-handler.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <input type='submit' class="btn btn-success" name='<?php $question_id ?>' value='play'/>
                                </form>
                            </div>
                            <div class="col">
                                <form action = 'index.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <button type="button" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"></path>
                                    </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                <?php
                }?>
            </div>
            </div>
            <?php
            }
            else{
            ?>
            <div class="col custom-col">
                <h1>My Games</h1>
                <div class="list-group">
                    <?php 
                        $author = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
                        $temp = $db->query(" SELECT * FROM jeopardy_games WHERE author='$author' ");
                        while ($row = $temp->fetch()) {
                            $title = $row['title'];
                            $category = $row['category'];
                            $description = $row['description'];
                    ?>
                    <div class="container" id="function">
                        <label type="text" class="list-group-item list-group-item-action" aria-current="true" > 
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo $title;?></h5>
                                <small><?php echo $category?></small>
                            </div>
                            <p class="mb-1"><?php echo $description?></p>
                            <small><?php echo $author?></small>
                        </label>
                    
                        <div class="row">
                            <div class="col">
                                <form action = 'delete-handler.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <input type='submit' class="btn btn-danger" name='<?php $question_id ?>' value='x'/>
                                </form>
                            </div>
                            <div class="col">
                                <form action = 'edit-handler.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <input type='submit' class="btn btn-primary" name='<?php $question_id ?>' value='edit'/>
                                </form>
                            </div>
                            <div class="col">
                                <form action = 'play-handler.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <input type='submit' class="btn btn-success" name='<?php $question_id ?>' value='play'/>
                                </form>
                            </div>
                            <div class="col">
                                <form action = 'index.php' method='post'>
                                    <input type="hidden" name="title" value="<?php echo $title?>" />
                                    <input type="hidden" name="author" value="<?php echo $author?>" />
                                    <input type="hidden" name="category" value="<?php echo $category?>" />
                                    <input type="hidden" name="description" value="<?php echo $description?>" />
                                    <button type="button" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"></path>
                                    </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <?php } ?>
                </div>
            </div>
            <?php 
                }
            ?>
            <!-- <div class="col vertical">
            </div> -->
            <div class="col custom-col">
                <h1>Favorites</h1>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Attack on Titan Jeopardy</h5>
                            <small>Anime</small>
                        </div>
                        <p class="mb-1">Questions are anime only, no spoilers!!!</p>
                        <small>Anonymous</small>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
        else{
            
    ?>
        <div class="container bg-image" style="background-color: rgba(0, 0, 128, .3); background-blend-mode: multiply; background-image: url('styles/rotunda.jpeg');
        height: 100vh; background-size: cover; background-position: center; position: relative; max-width:100%">    
            <h1 class="text-light text-center" style="padding-top: 12%">Sign in to play!</h1>
        </div>    
    <?php   

        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous">
    </script>
    <script>
        (function () {
                var highlight = document.getElementById('homepage-tab'); //anonymous function
                highlight.classList.add('active')
            })();
    </script>
</body>
</html>