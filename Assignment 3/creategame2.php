<!doctype html>
<html lang="en">
<?php
require_once "db_connection.php";
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
        function get_question_box($x) {
            $name = "question_" . $x;
            return $name;
        }
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            echo strlen($_POST['category_1']);
            if(strlen($_POST['point_1']) > 0 && strlen($_POST['point_2']) > 0 && strlen($_POST['point_3']) > 0 && strlen($_POST['point_4']) > 0 && strlen($_POST['point_5']) > 0
             && strlen($_POST['category_1']) > 0 && strlen($_POST['category_2']) > 0 && strlen($_POST['category_3']) > 0 && strlen($_POST['category_4']) > 0 && strlen($_POST['category_5']) > 0
             && strlen($_POST['question_1']) > 0 && strlen($_POST['question_2']) > 0 && strlen($_POST['question_3']) > 0 && strlen($_POST['question_4']) > 0 && strlen($_POST['question_5']) > 0
             && strlen($_POST['question_6']) > 0 && strlen($_POST['question_7']) > 0 && strlen($_POST['question_8']) > 0 && strlen($_POST['question_9']) > 0 && strlen($_POST['question_10']) > 0
             && strlen($_POST['question_11']) > 0 && strlen($_POST['question_12']) > 0 && strlen($_POST['question_13']) > 0 && strlen($_POST['question_14']) > 0 && strlen($_POST['question_15']) > 0
             && strlen($_POST['question_16']) > 0 && strlen($_POST['question_17']) > 0 && strlen($_POST['question_18']) > 0 && strlen($_POST['question_19']) > 0 && strlen($_POST['question_20']) > 0
             && strlen($_POST['question_21']) > 0 && strlen($_POST['question_22']) > 0 && strlen($_POST['question_23']) > 0 && strlen($_POST['question_24']) > 0 && strlen($_POST['question_25']) > 0            
            ){ //isset, !empty 
                echo "success";
                $usertitle_input = $_COOKIE['title'];
                $userauthor_input = $_COOKIE['author'];
                echo $usertitle_input;
                echo $userauthor_input;
                for ($i = 1; $i <= 25; $i++){
                    if ($i % 5 == 1){
                        $point = $_POST['point_1'];
                    }
                    else if ($i % 5 == 2){
                        $point = $_POST['point_2'];
                    }
                    else if ($i % 5 == 3){
                        $point = $_POST['point_3'];
                    }
                    else if ($i % 5 == 4){
                        $point = $_POST['point_4'];
                    }
                    else if ($i % 5 == 0){
                        $point = $_POST['point_5'];
                    }
                    if ($i / 5 <= 1){
                        $category = $_POST['category_1'];
                    }
                    else if ($i / 5 <= 2){
                        $category = $_POST['category_2'];
                    }
                    else if ($i / 5 <= 3){
                        $category = $_POST['category_3'];
                    }
                    else if ($i / 5 <= 4){
                        $category = $_POST['category_4'];
                    }
                    else if ($i / 5 <= 5){
                        $category = $_POST['category_5'];
                    }
                    echo $point;
                    $question = $_POST[get_question_box($i)];
                    echo "question:";
                    $txt = "INSERT INTO `jeopardy_game_questions` (`title`, `author`, `question`, `points`, `category`) 
                    VALUES ('$usertitle_input', '$userauthor_input', '$question', '$point', '$category');\n";
                    // echo $txt;
                    $db->query($txt);
                }
                
                // $myFile = "sql.txt";
                // $db_sql = fopen($myFile, "w") or die("can't open file");
                // fwrite($db_sql, $txt);
                // fclose($db_sql);  
                
                // setcookie('user', $_POST['email_name'], time()+3600); //60min 
                // setcookie('pwd', password_hash($_POST['pwd'], PASSWORD_DEFAULT), time()+3600);
                header('Location: index.php');
            }
        }
    ?>
    <form method="post" action="creategame2.php">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_1" name="point_1" value="100" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_2" name="point 2" value="200" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_3" name="point 3" value="300" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_4" name="point 4" value="400" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_5" name="point 5" value="500" onblur="check_point()"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_1" placeholder="category 1" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_1" placeholder="question 1" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_2" placeholder="question 2" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_3" placeholder="question 3" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_4" placeholder="question 4" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_5" placeholder="question 5" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_2" placeholder="category 2" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_6" placeholder="question 6" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_7" placeholder="question 7" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_8" placeholder="question 8" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_9" placeholder="question 9" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_10" placeholder="question 10" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">     
                    <div class="col-md category_block">
                        <input type="text" name="category_3" placeholder="category 3" />
                    </div>       
                    <div class="col-md question_block">
                        <input type="text" name="question_11" placeholder="question 11" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_12" placeholder="question 12" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_13" placeholder="question 13" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_14" placeholder="question 14" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_15" placeholder="question 15" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_4" placeholder="category 4" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_16" placeholder="question 16" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_17" placeholder="question 17" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_18" placeholder="question 18" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_19" placeholder="question 19" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_20" placeholder="question 20" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_5" placeholder="category 5" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_21" placeholder="question 21" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_22" placeholder="question 22" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_23" placeholder="question 23" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_24" placeholder="question 24" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_25" placeholder="question 25" />
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