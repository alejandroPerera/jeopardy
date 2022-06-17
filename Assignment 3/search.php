<?php
    require_once 'db_connection.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $content = $_POST['search-content'];
        $txt = "SELECT * FROM `jeopardy_games` WHERE 
        `title` LIKE '%$content%' 
        OR `author` LIKE '%$content%' 
        OR `category` LIKE '%$content%'
        OR `description` LIKE '%$content%'
        ;";
        $result = $db->query($txt);
        while($row = $result->fetch()){

        }
    }
?>