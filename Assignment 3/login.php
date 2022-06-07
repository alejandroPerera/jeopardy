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
        <script src="./javascript/login_check.js"></script>
    </head>
    <body>
        <?php
            include "navbar.php";
        
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(strlen($_POST['username']) > 0 && strlen($_POST['pwd']) > 0){ //isset, !empty 
                    $username_input = $_POST['username'];
                    $userpwd_input = $_POST['pwd'];
                    $user = $db->query(" SELECT * FROM user_info WHERE username = '$username_input' ");
                    $user_row = $user->fetch(PDO::FETCH_ASSOC);
                    if ($user_row == null){
                        echo "no such user";
                    }
                    else{
                        if ($user_row['password'] == $userpwd_input) {
                            setcookie('user', $_POST['username'], time()+3600); //60min 
                            setcookie('pwd', password_hash($_POST['pwd'], PASSWORD_DEFAULT), time()+3600);
                            header('Location: index.php');
                        }
                        else{
                            echo "wrong password";
                        }
                    }
                }
            }
        ?>

        <div class="row">
            <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="login.php">
                <label>Username: </label> 
                <input type="text" id="username" name="username" class="form-control form-control-lg" autofocus="" required="">
                <div id="user-msg" class="feedback"></div> 
                <br>
                <label>Password: </label> 
                <input type="password" id="pwd" name="pwd" class="form-control form-control-lg" required="" autocomplete="on">
                <div id="pwd-msg" class="feedback"></div> 
                <br>
                <div class='d-grid gap-2'>
                    <input type="submit" class="btn btn-dark btn-lg" value="Sign in">   <!-- use input type="submit" with the required attribute -->
                    <p>Don't have an account? <a href="signup.php">Sign up.</a></p> 
                </div>
            </form>
        </div>
            <div class="col-md-3"></div>
        </div>
        <script>
            (function () {
                var highlight = document.getElementById('login-tab');   //anonymous function
                highlight.classList.add('active')
            })();
        </script>

    </body>
</html>