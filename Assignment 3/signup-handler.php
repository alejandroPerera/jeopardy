<?php
//server side input validation 
require_once "db_connection.php";

$first_name = $last_name = $email_name = $pwd = NULL;
$first_name_msg = $last_name_msg = $email_name_msg = $pwd_msg = NULL;
$valid_email = $valid_pwd = $valid_fname = $valid_lname = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   $valid_fname = false;
   $valid_lname = false; 
   $valid_email = false;
   $valid_pwd = false;

   if (empty($_POST['first_name']))
      $first_name_msg = "--->Please enter your first name";
   else {
      $first_name = trim($_POST['first_name']);
      $first_name_msg = "";
      $valid_fname = true;
   }

   if (empty($_POST['last_name']))
      $last_name_msg = "---> Please enter your last name";
   else {
      $last_name = trim($_POST['last_name']);
      $last_name_msg = "";
      $valid_lname = true;
   }

      
   if (empty($_POST['email_name'])){
      $email_name_msg = "---> Please enter your email address";
   } elseif (!filter_var($_POST['email_name'], FILTER_VALIDATE_EMAIL)) {
      $email_name_msg = "---> Invalid email format";
      $email_name = trim($_POST['email_name']);
   }
   else{
      $email_name = trim($_POST['email_name']);
      $email_name_msg = "";
      $valid_email = true; 

   }


         
   if (empty($_POST['pwd'])){    
      $pwd_msg = "---> Please enter password";
   }  
   else
   {
      $pwd = trim($_POST['pwd']);
      $pwd_msg = "";
      $valid_pwd = true; 
   }
   
   if($valid_email && $valid_fname && $valid_lname && $valid_pwd){ //isset, !empty 
      $txt = "INSERT INTO `user_info` (`email`, `password`, `first_name`, `last_name`) VALUES ('$email_name', '$pwd', '$first_name', '$last_name');\n";
      //$myFile = "sql.txt";
      // $db_sql = fopen($myFile, "w") or die("can't open file");
      // fwrite($db_sql, $txt);
      // fclose($db_sql);  
      $db->query($txt);
      setcookie('user', $email_name, time()+3600); //60min 
      header('Location: login.php');
   }
}
?>
