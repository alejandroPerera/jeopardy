<!doctype html>
<html lang="en">
<?php
require_once "db_connection.php";
include_once "signup-handler.php";
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
        ?>
        
        <form class="row g-3 px-4" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" novalidate>
            <div class="col-6">
                <label class="form-label">First Name</label>
                <span class="msg text-danger"><?php if (!$valid_fname) echo $first_name_msg ?></span>
                <input type="text" name="first_name" class="form-control form-control-lg" id="first_name" placeholder="John" required=""
                value="<?php echo $first_name ?>">
            </div>
            <div class="col-6">
                <label class="form-label">Last Name</label>
                <span class="msg text-danger"><?php if (!$valid_lname) echo $last_name_msg ?></span>
                <input type="text" name="last_name" class="form-control form-control-lg" id="last_name" placeholder="Smith" required=""
                value="<?php echo $last_name ?>">
            </div>
            <div class="col-6">
                <label class="form-label">Email</label>
                <span class="msg text-danger"><?php if (!$valid_email) echo $email_name_msg ?></span>
                <input type="email" name="email_name" class="form-control form-control-lg" id="email_name" placeholder="email@address.com" required=""
                value="<?php echo $email_name ?>">
            </div>
            <div class="col-6">
                <label class="form-label">Password</label>
                <span class="msg text-danger"><?php if (!$valid_pwd) echo $pwd_msg ?></span>
                <input type="password" name = "pwd" class="form-control form-control-lg" id="pwd" placeholder="password" required=""
                value="<?php echo $pwd ?>">
            </div>
            <div class="d-grid gap-2 py-2">
                <input type="submit" class="btn btn-primary btn-lg" value="Sign up">
            </div> 
        </form>

        <script>
            (function () {
                var highlight = document.getElementById('login-tab');   //anonymous function
                highlight.classList.add('active')
            })();
        </script>

    </body>
</html>