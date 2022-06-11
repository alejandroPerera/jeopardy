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
            if ($_SERVER['REQUEST_METHOD'] == "POST"){
                
                setcookie('title', $_POST['title'], time()+3600); //60min 
                header('Location: creategame2.php');
            }
           
    ?>

    <div class="container bg-image" style="background-image: url('styles/bg.jpg');
            height: 35vh; background-size: cover; background-position: center; position: relative; max-width:100%">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form class="d-flex flex-column" role="search" style="text-align:center; padding: 11vh 0;">
                    <h1 class="p-3">
                        <input class="form-control" type="search" placeholder="Search for Jeopardy Games"
                            aria-label="Search" autofocus >
                    </h1>
                    <p class="p-3" style="text-align:center;">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Search</a>
                    </p>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



    <div class="container">
        <div class="row">
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
                    <form action='index.php', method="post">
                        <input type="hidden" name="title" value="<?php echo $title?>" />
                        <button type="submit" class="list-group-item list-group-item-action" aria-current="true" value="submit"> 
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?php echo $title;?></h5>
                                <small><?php echo $category?></small>
                            </div>
                            <p class="mb-1"><?php echo $description?></p>
                            <small><?php echo $author?></small>
                        </button>
                    </form>
                    <?php } ?>
                </div>

            </div>

            <div class="col vertical">

            </div>

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
        <h1>Need to login</h1>
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