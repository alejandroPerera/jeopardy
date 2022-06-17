<?php 
    require_once "db_connection.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $author = $_POST['author'];

        $category = $_POST['category'];
        $description = $_POST['description'];

        $result = $db->query(" SELECT * FROM jeopardy_game_questions WHERE title= '$title' AND author= '$author' ORDER BY `jeopardy_game_questions`.`category` ASC , `jeopardy_game_questions`.`points` ASC;");
        $results = $result->fetchAll();
        echo sizeof($results);
        if (sizeof($results) < 25){
            // echo $results[0]['question'];
            echo("<script type='text/javascript'>alert ('this game is unfinished yet');</script>");
            // header("refresh:0; url=playgame.php");
            header('refresh:0; url=index.php');
        }
        else{
            
            for ($i = 0; $i < 25; $i++ ){
                $tmp = 'question'.($i+$tmp+1);
                setcookie($tmp, $results[$i]['question'], time()+3600);
            }
            for ($i = 0; $i < 5; $i++){
                $point_tmp = 'points'.($i+1);
                setcookie($point_tmp, $results[$i]['points'], time()+3600);
            }
            for ($i = 0; $i < 5; $i++){
                $category_tmp = 'category'.($i+1);
                setcookie($category_tmp, $results[$i*5]['category'], time()+3600);
            }
            header("refresh:0; url=playgame.php");
        }
    }
?> 