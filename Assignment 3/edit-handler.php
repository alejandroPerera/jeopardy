<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        setcookie('title', $_POST['title'], time()+3600); //60min 
        header('Location: creategame2.php');
    }
?>