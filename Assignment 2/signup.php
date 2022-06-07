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
        
        ?>

        <form class="row g-3 px-4">
            <div class="col-6">
                <label class="form-label">First name</label>
                <input type="text" class="form-control form-control-lg" id="inputEmail4" placeholder="John" required="">
            </div>
            <div class="col-6">
                <label for="inputPassword4" class="form-label">Last name</label>
                <input type="text" class="form-control form-control-lg" id="inputPassword4" placeholder="Smith" required="">
            </div>
            <div class="col-6">
                <label class="form-label">Email</label>
                <input type="email" class="form-control form-control-lg" placeholder="email@address.com" required="">
            </div>
            <div class="col-6">
                <label class="form-label">Password</label>
                <input type="password" class="form-control form-control-lg" placeholder="password" required="">
            </div>
            <div class="d-grid gap-2 py-2">
                <a class="btn btn-primary btn-lg" href="login.php" role="button">Sign Up</a>
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