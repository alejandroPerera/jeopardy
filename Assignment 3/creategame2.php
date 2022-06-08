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
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(strlen($_POST['point_1']) > 0 && strlen($_POST['point_2']) > 0 && strlen($_POST['point_3']) > 0 && strlen($_POST['point_4']) > 0 && strlen($_POST['point_5']) > 0
             && strlen($_POST['category 1']) > 0 && strlen($_POST['category 2']) > 0 && strlen($_POST['category 3']) > 0 && strlen($_POST['category 4']) > 0 && strlen($_POST['category 5']) > 0
             && strlen($_POST['question 1']) > 0 && strlen($_POST['question 2']) > 0 && strlen($_POST['question 3']) > 0 && strlen($_POST['question 4']) > 0 && strlen($_POST['question 5']) > 0
             && strlen($_POST['question 6']) > 0 && strlen($_POST['question 7']) > 0 && strlen($_POST['question 8']) > 0 && strlen($_POST['question 9']) > 0 && strlen($_POST['question 10']) > 0
             && strlen($_POST['question 11']) > 0 && strlen($_POST['question 12']) > 0 && strlen($_POST['question 13']) > 0 && strlen($_POST['question 14']) > 0 && strlen($_POST['question 15']) > 0
             && strlen($_POST['question 16']) > 0 && strlen($_POST['question 17']) > 0 && strlen($_POST['question 18']) > 0 && strlen($_POST['question 19']) > 0 && strlen($_POST['question 20']) > 0
             && strlen($_POST['question 21']) > 0 && strlen($_POST['question 22']) > 0 && strlen($_POST['question 23']) > 0 && strlen($_POST['question 24']) > 0 && strlen($_POST['question 25']) > 0            
            ){ //isset, !empty 
                $usertitle_input = $_COOKIE['title'];
                $userauthor_input = $_COOKIE['author'];
                $txt = "INSERT INTO `jeopardy_game_questions` (`title`, `author`, `question`, `points`, `category`) VALUES ('$usertitle_input', '$userauthor_input', '$usercategory_input', '$userdescription_input');\n
                
                
                ";
                // $myFile = "sql.txt";
                // $db_sql = fopen($myFile, "w") or die("can't open file");
                // fwrite($db_sql, $txt);
                // fclose($db_sql);  
                $db->query($txt);
                // setcookie('user', $_POST['email_name'], time()+3600); //60min 
                // setcookie('pwd', password_hash($_POST['pwd'], PASSWORD_DEFAULT), time()+3600);
                header('Location: creategame2.php');
            }
        }
    ?>
    <form method="post" onsubmit="">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_1" name="point_1" placeholder="100" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_2" name="point 2" placeholder="200" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_3" name="point 3" placeholder="300" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_4" name="point 4" placeholder="400" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_5" name="point 5" placeholder="500" onblur="check_point()"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category 1" placeholder="category 1" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 1" placeholder="question 1" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 2" placeholder="question 2" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 3" placeholder="question 3" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 4" placeholder="question 4" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 5" placeholder="question 5" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category 2" placeholder="category 2" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 6" placeholder="question 6" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 7" placeholder="question 7" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 8" placeholder="question 8" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 9" placeholder="question 9" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 10" placeholder="question 10" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">     
                    <div class="col-md category_block">
                        <input type="text" name="category 3" placeholder="category 3" />
                    </div>       
                    <div class="col-md question_block">
                        <input type="text" name="question 11" placeholder="question 11" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 12" placeholder="question 12" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 13" placeholder="question 13" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 14" placeholder="question 14" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 15" placeholder="question 15" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category 4" placeholder="category 4" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 16" placeholder="question 16" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 17" placeholder="question 17" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 18" placeholder="question 18" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 19" placeholder="question 19" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 20" placeholder="question 20" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category 5" placeholder="category 5" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 21" placeholder="question 21" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 22" placeholder="question 22" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 23" placeholder="question 23" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 24" placeholder="question 24" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question 25" placeholder="question 25" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <input type="submit" class="btn btn-dark" value="Submit">
                </div>
            </div>
        </div>
    </form>
    
    <script>
        (function () {
                var highlight = document.getElementById('create-tab');  //anonymous function
                highlight.classList.add('active')
            })();
    </script>
</body>
</html>