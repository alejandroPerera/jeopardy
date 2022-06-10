<?php
if(isset($_GET['modal-first-name'])){
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){

        $new_first_name = $_GET['modal-first-name'];
        $new_last_name = $_GET['modal-last-name'];
        $new_email = $_GET['modal-email'];

        $email = $_SESSION['email'];

        $q = "UPDATE user_info SET first_name='$new_first_name', last_name='$new_last_name', email='$new_email' WHERE email='$email' ";
        $db->query($q);


        $_SESSION['email'] = $new_email; 
        $_SESSION['first_name'] = $new_first_name;
        $_SESSION['last_name'] = $new_last_name;
    }
}
?>