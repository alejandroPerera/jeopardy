<!doctype html>
<html lang="en">
<?php
require_once "db_connection.php";
require_once "session_create.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeopardy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet" type="text/css">
    <script src="./javascript/point_check.js"></script>
</head>
<body>
    <?php 
        include "navbar.php";
    ?>

    <?php
        if(isset($_COOKIE['user']))   // COOKIES
        {
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(strlen($_POST['title']) > 0 && strlen($_POST['author']) > 0 && strlen($_POST['category']) > 0 && strlen($_POST['description']) > 0){ //isset, !empty 
                    $usertitle_input = $_POST['title'];
                    $userauthor_input = $_POST['author'];
                    $usercategory_input = $_POST['caegory'];
                    $userdescription_input = $_POST['description'];
                    $txt = "INSERT INTO `jeopardy_games` (`title`, `author`, `category`, `description`) VALUES ('$usertitle_input', '$userauthor_input', '$usercategory_input', '$userdescription_input');\n";
                    // $myFile = "sql.txt";
                    // $db_sql = fopen($myFile, "w") or die("can't open file");
                    // fwrite($db_sql, $txt);
                    // fclose($db_sql);  
                    $db->query($txt);
                    setcookie('title', $_POST['title'], time()+3600); //60min 
                    header('Location: creategame2.php');
                }
            }
    ?>

    <div class="container bg-image custom-col" style="background-image: url('styles/bg.jpg');
            height: 35vh; background-size: cover; background-position: center; position: relative; max-width:100%">
        <h1 style='color:white'>Create Your Own Game!</h1> 
    </div>
    <?php echo $_SESSION['first_name'] . $_SESSION['last_name']?>
    <form class = 'px-4' method="post" action="creategame1.php" novalidate>
        <div class="form-group py-2">
            <label for="exampleFormControlInput1">Title</label>
            <input type="email" name="title" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="My Jeopardy Game">
        </div>

        <div class="form-group py-2">
            <label for="exampleFormControlInput1">Author</label>
            <input type="email" name="author" class="form-control form-control-lg" id="exampleFormControlInput1" value="<?php echo $_SESSION['first_name'] . $_SESSION['last_name']?>">
        </div>

        <div class="form-group py-2">
            <label for="exampleFormControlInput1">Category</label>
            <input type="email" name="category" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="English">
        </div>

        <div class="form-group py-2">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="d-grid gap-2 py-2">
            <input type="submit" class="btn btn-primary btn-lg" value="Continue">
            <!-- <a class="btn btn-primary btn-lg" href="creategame2.php" role="button">Continue</a> -->
        </div> 
    </form>

    <?php
        }
        else{
            
    ?> 
        <h1>Need to login</h1>
    <?php   

        }
    ?>

    <script>
        (function () {
                var highlight = document.getElementById('create-tab');   //anonymous function
                highlight.classList.add('active')
            })();
    </script>
</body>
</html>