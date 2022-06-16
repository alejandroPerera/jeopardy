<?php 
    require_once "db_connection.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $author = $_POST['author'];

        $category = $_POST['category'];
        $description = $_POST['description'];

        $result = $db->query(" SELECT * FROM jeopardy_game_questions WHERE title= '$title' AND author= '$author' ;");
        $results = $result->fetchAll();
        if (sizeof($results) < 25){
            // echo $results[0]['question'];
            echo("<script type='text/javascript'>alert ('this game is unfinished yet');</script>");
            header('refresh:0; url=index.php');
        }
        else{
            header('refresh:0; url=http://localhost:4200');
        }
    }
?> 