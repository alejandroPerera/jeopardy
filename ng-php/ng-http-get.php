<?php
// header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');  
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

$getdata = $_GET['str'];


//handle specialsymboals; " --> %22
//json
$request = json_decode(urldecode($getdata));

//process data
//attach current date
$current_date = date("Y-m-d");

//prepare response
// construct everything back and return 
foreach ($request as $k => $v) {
    $data[$k] = $v;
}
$data['order_date'] = $current_date;

//return the response --> display
echo json_encode([$data]);

?>