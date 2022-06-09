<?php
if(session_status() === PHP_SESSION_NONE)
    session_start(); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(strlen($_POST['first_name']) > 0){
        $_SESSION['first_name'] = $_POST['first_name'];
    }
    if(strlen($_POST['last_name']) > 0){
    $_SESSION['last_name'] = $_POST['last_name'];
    }
    if(strlen($_POST['email_name']) > 0){
        $_SESSION['email_name'] = $_POST['email_name'];
    }
    if(strlen($_POST['pwd']) > 0){
        $_SESSION['pwd'] = $_POST['pwd'];
    }  
}
?>