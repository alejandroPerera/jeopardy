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
            include "navbar.html";
        ?>
        <form action="login.php" onsubmit="return (check())">
            <label>Username: </label> 
            <input type="text" id="username" class="form-control" autofocus="" required="" onblur="checkusername()">
            <div id="user-msg" class="feedback"></div> 
            <br>
            <label>Password: </label> 
            <input type="password" id="pwd" class="form-control" required="" autocomplete="on">
            <div id="pwd-msg" class="feedback"></div> 
            <br>
            <input type="submit" class="btn btn-dark" value="Sign in">   <!-- use input type="submit" with the required attribute -->
        </form>
        
    </body>
</html>