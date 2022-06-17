<?php
require_once "db_connection.php";

header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');  
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

$postdata = file_get_contents("php://input");


//handle specialsymboals; " --> %22
//json
$request = json_decode($postdata, true);

$first_name = $request['firstName'];
$last_name = $request['lastName'];
$email = $request['email'];
$pwd = $request['password']; 

$statement = $db->prepare("SELECT * FROM user_info WHERE email=?");
$statement->execute([$email]);
$user = $statement->fetch();

$response = NULL;

if($user){
    //email already exists
    $response = ['Email is already registered. Please use different email or sign in.'];
} else {
    $txt = "INSERT INTO `user_info` (`email`, `password`, `first_name`, `last_name`) VALUES ('$email', '$pwd', '$first_name', '$last_name');\n";    
    $db->query($txt);   
    $response = ['Successfully signed up. Welcome!'];
}

echo json_encode([$response])

?>