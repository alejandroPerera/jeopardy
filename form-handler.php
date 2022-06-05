<?php
$name = $email = $comment = NULL;
$name_msg = $email_msg = $comment_msg =NULL;
$error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty($_POST['name'])){
        $name_msg = 'Pease enter name';
        $error = true;
    }
    else{
        $name = $_POST['name'];
    }
    if (empty($_POST['emailaddr'])){
        $email_msg = 'Pease enter email';
        $error = true;
    }
    else{
        $email = $_POST['emailaddr'];
    }
    if (empty($_POST['comment'])){
        $comment_msg = 'Pease enter comment';
        $error = true;
    }
    else{
        $comment = $_POST['comment'];
    }
    
    // if ($name_msg != NULL || $emial_msg != NULL || $comment_msg != NULL){
    //     echo "Error massage: $name_msg <br/> $email_msg <br/> $comment_msg <br/> ";
    // } 
}
?>