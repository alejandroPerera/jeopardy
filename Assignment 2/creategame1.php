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
        include "navbar.html";
    ?>
    <form>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="create_game">
                    <input type="text" class="form-control" id="subject">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="create_game">
                    <input type="text" class="form-control" id="subject">
                </div>
            </div>
            <div class="col-md-4"></div>            
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="create_game">
                    <input type="text" class="form-control" id="subject">
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
</body>
</html>