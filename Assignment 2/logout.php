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
        
        <?php include "navbar.php" ?>
        <div class="container">
            <h1>Logged Out</h1>
            <p>Redirecting to login...</p>
        </div>

        <?php
            if (count($_COOKIE) > 0) {//have set some cookies
            foreach ($_COOKIE as $key => $value){
                unset($_COOKIE[$key]); //on server side
                setcookie($key, '', time()-3600); //set to null, and expire in the past: automatically removed by browser
            }
            header('refresh:2; url=login.php'); //redirect after 5 seconds
            }
        ?>

        <script>
            (function () {
                var highlight = document.getElementById('login-tab');   //anonymous function
                highlight.classList.add('active')
            })();
        </script>

    </body>
</html>