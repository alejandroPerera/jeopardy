<?php
require_once "db_connection.php";

$first_name_msg = $last_name_msg = $email_msg = $new_pwd_msg = $current_pwd_msg= NULL;
$valid_email = $valid_pwd = $valid_fname = $valid_lname = NULL;
$correct_pwd = true;

if(isset($_GET['modal-first-name'])){
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){

        $new_first_name = $_GET['modal-first-name'];                    //update info 
        $new_last_name = $_GET['modal-last-name'];
        $new_email = $_GET['modal-email'];
        $current_pwd = $_GET['modal-current-pwd'];
        $new_pwd = $_GET['modal-new-pwd'];

        $current_email = $_SESSION['email'];                            //current info
        $user = $db->query(" SELECT * FROM user_info WHERE email = '$current_email' ");
        $user_row = $user->fetch(PDO::FETCH_ASSOC);
        $database_pwd = $user_row['password'];

        if(strlen($current_pwd) > 0 && $current_pwd != $database_pwd){
            $current_pwd_msg = "password do not match";
            $correct_pwd = false;

        } else {
            $current_pwd_msg = "";
            $correct_pwd = true;
            if(strlen($new_pwd) > 0){
                $q = "UPDATE user_info SET password = '$new_pwd' WHERE email = '$current_email' ";
                $db -> query($q);
            }
        }

        


        
        $q = "UPDATE user_info SET first_name='$new_first_name', last_name='$new_last_name', email='$new_email' WHERE email='$current_email' ";
        $db->query($q);

        


        $_SESSION['email'] = $new_email; 
        $_SESSION['first_name'] = $new_first_name;
        $_SESSION['last_name'] = $new_last_name;

        if($current_pwd && !($new_pwd)){
            //must type new password
        } elseif (!($current_pwd) && $new_pwd){
            //must type current password 
        } else {
            //must check if current matches database 

        }
            
    }
}
?>