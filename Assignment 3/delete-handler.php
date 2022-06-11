<?php 
    require_once "db_connection.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'];
        $author = $_POST['author'];

        $category = $_POST['category'];
        $description = $_POST['description'];

        $db->query(" DELETE FROM jeopardy_games WHERE title= '$title' AND author= '$author' AND category= '$category' AND description= '$description'; 
        DELETE FROM jeopardy_game_questions WHERE title= '$title' AND author= '$author' ;");
       
       header('Location: index.php');
    }
?> 
