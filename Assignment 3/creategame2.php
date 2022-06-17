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
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
        include "navbar.php";
        function get_question_box($x) {
            $name = "question_" . $x;
            return $name;
        }

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $save_or_not = false;
            function prompt(){
                echo("<script type='text/javascript'> var answer = confirm('We want to save the unfinished jeopardy game'); </script>");
                $answer = "<script type='text/javascript'> document.write(answer); </script>";
                return($answer);
            }
            // echo strlen($_POST['category_1']);
            // echo prompt();
            while($save_or_not == null){
                $save_or_not = prompt();
            }
            // echo $save_or_not;
            if( (!empty($_POST['point_1']) > 0 && strlen($_POST['point_2']) > 0 && strlen($_POST['point_3']) > 0 && strlen($_POST['point_4']) > 0 && strlen($_POST['point_5']) > 0
             && strlen($_POST['category_1']) > 0 && strlen($_POST['category_2']) > 0 && strlen($_POST['category_3']) > 0 && strlen($_POST['category_4']) > 0 && strlen($_POST['category_5']) > 0
             && strlen($_POST['question_1']) > 0 && strlen($_POST['question_2']) > 0 && strlen($_POST['question_3']) > 0 && strlen($_POST['question_4']) > 0 && strlen($_POST['question_5']) > 0
             && strlen($_POST['question_6']) > 0 && strlen($_POST['question_7']) > 0 && strlen($_POST['question_8']) > 0 && strlen($_POST['question_9']) > 0 && strlen($_POST['question_10']) > 0
             && strlen($_POST['question_11']) > 0 && strlen($_POST['question_12']) > 0 && strlen($_POST['question_13']) > 0 && strlen($_POST['question_14']) > 0 && strlen($_POST['question_15']) > 0
             && strlen($_POST['question_16']) > 0 && strlen($_POST['question_17']) > 0 && strlen($_POST['question_18']) > 0 && strlen($_POST['question_19']) > 0 && strlen($_POST['question_20']) > 0
             && strlen($_POST['question_21']) > 0 && strlen($_POST['question_22']) > 0 && strlen($_POST['question_23']) > 0 && strlen($_POST['question_24']) > 0 && strlen($_POST['question_25']) > 0            
            ) || $save_or_not){ //isset, !empty 
                //  echo "success";
                $usertitle_input = $_COOKIE['title'];
                $userauthor_input = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
                // echo $usertitle_input;
                // echo $userauthor_input;
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
                    // echo $point;
                    $question = $_POST[get_question_box($i)];
                    // echo "question:";
                    $txt = "INSERT INTO `jeopardy_game_questions` (`title`, `author`, `question`, `points`, `category`) 
                    VALUES ('$usertitle_input', '$userauthor_input', '$question', '$point', '$category');\n";
                    // echo $txt;
                    $db->query($txt);
                }    
                header('refresh:0; url=index.php');
            }
            header('refresh:0; url=index.php');
        }
        $author = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
        $title = $_COOKIE['title'];
        $points = [];
        $categories = [];
        $questions = [];
        $points_inorder = [];
        $result = $db->query(" SELECT question, points, category FROM jeopardy_game_questions WHERE author='$author' AND title='$title' ");
        while ($row = $result->fetch()){
            // echo $row['points'];
            if (!in_array($row['points'], $points)){
                array_push($points, $row['points']);
            }
            if (!in_array($row['category'], $categories)){
                array_push($categories, $row['category']);
            }
        }
        // foreach ($categories as $item){
        //     echo $item;
        // }
        $index = 1;
        // echo min($points);
        if (sizeof($points) > 0){
            $temp = min($points);
        }
        else{
            $temp = -1;
        }
        // echo "true";
        function smallest_value($x){
            // echo "haha";
            $smallest = -1;
            // echo $smallest;
            foreach ($x as $item){
                if ($item == -1){
                    continue;
                }
                else{
                    $smallest = $item;
                    break;
                }
            }
            // echo $smallest;
            foreach ($x as $item){
                if ($item == -1){
                    continue;
                }
                else{
                    if ($item < $smallest){
                        $smallest = $item;
                    }
                }
            }
            return $smallest;
        }
        while ($temp != -1){
            $change_points = false;
            // echo $temp;
            array_push($points_inorder, $temp);
            for ($i = 0; $i < sizeof($points); $i++){
                // echo $i;
                if ($points[$i] == $temp){
                    $points[$i] = -1;
                    // echo $points[$i];
                    $temp = smallest_value($points);
                    // echo $temp;
                    break;
                }
            }
        }
        
        foreach ($points_inorder as $p){
            foreach ($categories as $c){
                // echo $c;
                $r = $db->query(" SELECT question FROM jeopardy_game_questions WHERE author='$author' AND title='$title' AND points='$p' AND category='$c' ");
                $ro = $r->fetch();
                // echo $ro['question'];
                array_push($questions, $ro['question']);
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
                            <input class="point" type="text" id="point_1" name="point_1" value="<?php 
                            if (sizeof($points_inorder) < 1){
                                echo "100";
                            }
                            else{
                                echo $points_inorder[0];
                            }
                            ?>" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_2" name="point 2" value="<?php 
                            if (sizeof($points_inorder) < 2){
                                echo "200";
                            }
                            else{
                                echo $points_inorder[1];
                            }
                            ?>" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_3" name="point 3" value="<?php
                            if (sizeof($points_inorder) < 3){
                                echo "300";
                            }
                            else{
                                echo $points_inorder[2];
                            }
                            ?>" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_4" name="point 4" value="<?php
                            if (sizeof($points_inorder) < 4){
                                echo "400";
                            }
                            else{
                                echo $points_inorder[3];
                            }
                            ?>" onblur="check_point()"/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="col-md point_block">
                            <input class="point" type="text" id="point_5" name="point 5" value="<?php
                            if (sizeof($points_inorder) < 5){
                                echo "500";
                            }
                            else{
                                echo $points_inorder[4];
                            }
                            ?>" onblur="check_point()"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_1" value="<?php
                        if (sizeof($points_inorder) < 1){
                            echo "";
                        }
                        else{
                            echo $categories[0];
                        }
                        ?>" placeholder="category 1" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_1" value="<?php
                        if (sizeof($questions) < 1){
                            echo "";
                        }
                        else{
                            echo $questions[0];
                        }
                        ?>" placeholder="question 1" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_2" value="<?php
                        if (sizeof($questions) < 2){
                            echo "";
                        }
                        else{
                            echo $questions[1];
                        }
                        ?>" placeholder="question 2" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_3" value="<?php
                        if (sizeof($questions) < 3){
                            echo "";
                        }
                        else{
                            echo $questions[2];
                        }
                        ?>" placeholder="question 3" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_4" value="<?php
                        if (sizeof($questions) < 4){
                            echo "";
                        }
                        else{
                            echo $questions[3];
                        }
                        ?>" placeholder="question 4" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_5" value="<?php
                        if (sizeof($questions) < 5){
                            echo "";
                        }
                        else{
                            echo $questions[4];
                        }
                        ?>" placeholder="question 5" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_2" value="<?php
                        if (sizeof($categories) < 2){
                            echo "";
                        }
                        else{
                            echo $categories[1];
                        }
                        ?>" placeholder="category 2" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_6" value="<?php
                        if (sizeof($questions) < 6){
                            echo "";
                        }
                        else{
                            echo $questions[5];
                        }
                        ?>" placeholder="question 6" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_7" value="<?php
                        if (sizeof($questions) < 7){
                            echo "";
                        }
                        else{
                            echo $questions[6];
                        }
                        ?>" placeholder="question 7" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_8" value="<?php
                        if (sizeof($questions) < 8){
                            echo "";
                        }
                        else{
                            echo $questions[7];
                        }
                        ?>" placeholder="question 8" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_9" value="<?php
                        if (sizeof($questions) < 9){
                            echo "";
                        }
                        else{
                            echo $questions[8];
                        }
                        ?>" placeholder="question 9" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_10" value="<?php
                        if (sizeof($questions) < 10){
                            echo "";
                        }
                        else{
                            echo $questions[9];
                        }
                        ?>" placeholder="question 10" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">     
                    <div class="col-md category_block">
                        <input type="text" name="category_3" value="<?php
                        if (sizeof($categories) < 3){
                            echo "";
                        }
                        else{
                            echo $categories[2];
                        }
                        ?>"placeholder="category 3" />
                    </div>       
                    <div class="col-md question_block">
                        <input type="text" name="question_11" value="<?php
                        if (sizeof($questions) < 11){
                            echo "";
                        }
                        else{
                            echo $questions[10];
                        }
                        ?>" placeholder="question 11" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_12" value="<?php
                        if (sizeof($questions) < 12){
                            echo "";
                        }
                        else{
                            echo $questions[11];
                        }
                        ?>" placeholder="question 12" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_13" value="<?php
                        if (sizeof($questions) < 13){
                            echo "";
                        }
                        else{
                            echo $questions[12];
                        }
                        ?>" placeholder="question 13" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_14" value="<?php
                        if (sizeof($questions) < 14){
                            echo "";
                        }
                        else{
                            echo $questions[13];
                        }
                        ?>" placeholder="question 14" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_15" value="<?php
                        if (sizeof($questions) < 15){
                            echo "";
                        }
                        else{
                            echo $questions[14];
                        }
                        ?>" placeholder="question 15" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_4" value="<?php
                        if (sizeof($categories) < 4){
                            echo "";
                        }
                        else{
                            echo $categories[3];
                        }
                        ?>"placeholder="category 4" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_16" value="<?php
                        if (sizeof($questions) < 16){
                            echo "";
                        }
                        else{
                            echo $questions[15];
                        }
                        ?>" placeholder="question 16" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_17" value="<?php
                        if (sizeof($questions) < 17){
                            echo "";
                        }
                        else{
                            echo $questions[16];
                        }
                        ?>" placeholder="question 17" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_18" value="<?php
                        if (sizeof($questions) < 18){
                            echo "";
                        }
                        else{
                            echo $questions[17];
                        }
                        ?>" placeholder="question 18" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_19" value="<?php
                        if (sizeof($questions) < 19){
                            echo "";
                        }
                        else{
                            echo $questions[18];
                        }
                        ?>" placeholder="question 19" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_20" value="<?php
                        if (sizeof($questions) < 20){
                            echo "";
                        }
                        else{
                            echo $questions[19];
                        }
                        ?>" placeholder="question 20" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md category_block">
                        <input type="text" name="category_5" value="<?php
                        if (sizeof($categories) < 5){
                            echo "";
                        }
                        else{
                            echo $categories[4];
                        }
                        ?>"placeholder="category 5" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_21" value="<?php
                        if (sizeof($questions) < 21){
                            echo "";
                        }
                        else{
                            echo $questions[20];
                        }
                        ?>" placeholder="question 21" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_22" value="<?php
                        if (sizeof($questions) < 22){
                            echo "";
                        }
                        else{
                            echo $questions[21];
                        }
                        ?>" placeholder="question 22" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_23" value="<?php
                        if (sizeof($questions) < 23){
                            echo "";
                        }
                        else{
                            echo $questions[22];
                        }
                        ?>" placeholder="question 23" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_24" value="<?php
                        if (sizeof($questions) < 24){
                            echo "";
                        }
                        else{
                            echo $questions[23];
                        }
                        ?>" placeholder="question 24" />
                    </div>
                    <div class="col-md question_block">
                        <input type="text" name="question_25" value="<?php
                        if (sizeof($questions) < 25){
                            echo "";
                        }
                        else{
                            echo $questions[24];
                        }
                        ?>" placeholder="question 25" />
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <input type="submit" class="btn btn-dark" value="Submit" >
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