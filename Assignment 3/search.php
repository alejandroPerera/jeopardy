<?php
    require_once 'db_connection.php';
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        header("Location: index.php" . "?search=" . $_POST['search-content']);
    }
?>