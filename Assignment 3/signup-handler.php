<?php
//server side input validation 

$first_name = $last_name = $email_name = $pwd = NULL;
$first_name_msg = $last_name_msg = $email_name_msg = $pwd_msg = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (empty($_POST['first_name']))
      $first_name_msg = "--->Please enter your first name";
   else
   {
      $first_name = trim($_POST['first_name']);
      // You may reset $name_msg and use it to determine
      // when to display an error message
      // $name_msg = "";
   }

   if (empty($_POST['last_name']))
      $last_name_msg = "---> Please enter your last name";
   else
   {
      $last_name = trim($_POST['last_name']);
      // You may reset $email_msg and use it to determine
      // when to display an error message
      // $email_msg = "";
   }
		
   if (empty($_POST['email_name']))
      $email_name_msg = "---> Please enter your email address";
   else
   {
      $email_name = trim($_POST['email_name']);
      // You may reset $email_msg and use it to determine
      // when to display an error message
      // $email_msg = "";
   }
			
   if (empty($_POST['pwd']))
      $pwd_msg = "---> Please enter password";
   else
   {
      $pwd = trim($_POST['pwd']);
      // You may reset $comment_msg and use it to determine
      // when to display an error message
      // $comment_msg = "";
   }
}

?>
