<?php 
    require_once "db_connection.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $favorite = $_POST['favorite'];
        

        if($favorite){
            $txt = "INSERT INTO favorites SELECT * FROM jeopardy_games WHERE title= '$title' AND author= '$author' AND category= '$category' AND description= '$description';"; 
       
        } else { 
            $txt = "DELETE FROM favorites WHERE title= '$title' AND author= '$author' AND category= '$category' AND description= '$description';"; 
        }
        $db->query($txt);
        header('Location: index.php');
    }

?>