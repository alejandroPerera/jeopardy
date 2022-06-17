<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');  
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

$postdata = file_get_contents("php://input");


//handle specialsymboals; " --> %22
//json
$request = json_decode($postdata, true);

//process data
//attach current date
$data = [];
$current_date = date("Y-m-d");

// prepare response
// construct everything back and return 

foreach ($request as $k => $v) {
    $data[$k] = $v;
}
$data['post_order_date'] = $current_date;


// foreach ($request as $order => $order_info) {
//     $temp = [];
//     foreach ($order_info as $k => $v) {
//         $temp[$k] = $v;
//     }
//     $temp['order_date'] = $current_date;
//     $data[$order] = $temp;
// }

//return the response --> display
echo json_encode($request['firstName']);

?>