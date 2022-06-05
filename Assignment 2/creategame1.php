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
    <script src="./javascript/point_check.js"></script>
</head>
<body>
    <?php 
        include "navbar.php";
    ?>

    <?php
        if(isset($_COOKIE['user']))   // COOKIES
            {
    ?>

    <div class="container bg-image custom-col" style="background-image: url('styles/bg.jpg');
            height: 35vh; background-size: cover; background-position: center; position: relative; max-width:100%">
        <h1 style='color:white'>Create Your Own Game!</h1> 
    </div>

    <form class = 'px-4'>
        <div class="form-group py-2">
            <label for="exampleFormControlInput1">Title</label>
            <input type="email" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="My Jeopardy Game">
        </div>

        <div class="form-group py-2">
            <label for="exampleFormControlInput1">Author</label>
            <input type="email" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="John Smith">
        </div>

        <div class="form-group py-2">
            <label for="exampleFormControlInput1">Category</label>
            <input type="email" class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="English">
        </div>

        <div class="form-group py-2">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="d-grid gap-2 py-2">
            <a class="btn btn-primary btn-lg" href="creategame2.php" role="button">Continue</a>
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