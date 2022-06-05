<!doctype html>
<html lang="en">
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
                if(strlen($_POST['username']) > 0){ //isset, !empty 
                    setcookie('user', $_POST['username'], time()+3600); //60min 
                    setcookie('pwd', password_hash($_POST['pwd'], PASSWORD_DEFAULT), time()+3600);
                    header('Location: index.php');
                }
            }
        ?>

        <div class="row">
            <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" onsubmit="return check()">
                <label>Username: </label> 
                <input type="text" id="username" name="username" class="form-control form-control-lg" autofocus="" required="" onblur="checkusername()">
                <div id="user-msg" class="feedback"></div> 
                <br>
                <label>Password: </label> 
                <input type="password" id="pwd" name="pwd" class="form-control form-control-lg" required="" autocomplete="on">
                <div id="pwd-msg" class="feedback"></div> 
                <br>
                <div class='d-grid gap-2'>
                    <input type="submit" class="btn btn-dark btn-lg" value="Sign in">   <!-- use input type="submit" with the required attribute -->
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