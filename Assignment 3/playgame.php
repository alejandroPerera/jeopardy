<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeopardy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="./styles/main.css" rel="stylesheet" type="text/css">
    <!-- <script src="../../../../Assignment 3/javascript/point_check.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'navbar.php'?>
    <form>
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md game_block">
                        <button type="submit" name="question_1">category 1 <br>100 points</button>
                        <!-- <input type="submit" name="question_1" value="" placeholder="category 1 100 points"  /> -->
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_2" value="" placeholder="category 1 200 points" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_3" value="" placeholder="category 1 300 points" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_4" value="" placeholder="category 1 400 points" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_5" value="" placeholder="category 1 500 points" />
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md question_block">
                    <input type="text" name="question_1" value="" placeholder="category 2 100 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_2" value="" placeholder="category 2 200 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_3" value="" placeholder="category 2 300 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_4" value="" placeholder="category 2 400 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_5" value="" placeholder="category 2 500 points" />
                </div>
            </div>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md question_block">
                    <input type="text" name="question_1" value="" placeholder="category 3 100 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_2" value="" placeholder="category 3 200 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_3" value="" placeholder="category 3 300 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_4" value="" placeholder="category 3 400 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_5" value="" placeholder="category 3 500 points" />
                </div>
            </div>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md question_block">
                    <input type="text" name="question_1" value="" placeholder="category 4 100 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_2" value="" placeholder="category 4 200 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_3" value="" placeholder="category 4 300 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_4" value="" placeholder="category 4 400 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_5" value="" placeholder="category 4 500 points" />
                </div>
            </div>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md question_block">
                    <input type="text" name="question_1" value="" placeholder="category 5 100 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_2" value="" placeholder="category 5 200 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_3" value="" placeholder="category 5 300 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_4" value="" placeholder="category 5 400 points" />
                </div>
                <div class="col-md question_block">
                    <input type="text" name="question_5" value="" placeholder="category 5 500 points" />
                </div>
            </div>
            </div>
        </div>
    </form>
  
</body>