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
$result = [];
// prepare response
// construct everything back and return 

foreach ($request as $k => $v) {
    $data[$k] = $v;
}
$week1 = ['mon1', 'tue1', 'wed1', 'thu1', 'fri1'];
$week2 = ['mon2', 'tue2', 'wed2', 'thu2', 'fri2'];
$sum1 = 0;
foreach ($week1 as $day){
    $sum1 += $data[$day];
}
$sum1 /= 5;
$result['week1_avg'] = "First week: average temperature is " . $sum1;
$sum2 = 0;
foreach ($week2 as $day){
    $sum2 += $data[$day];
}
$sum2 /= 5;
$result['week2_avg'] = "Second week: average temperature is " . $sum2;
if ($sum1 > $sum2){
    $result['con'] = "The first week's average temperature is higher";
}
else if ($sum1 < $sum2){
    $result['con'] = "The second week's average temperature is higher";
}
else{
    $result['con'] = "Both weeks have the same average temperature";
}
echo json_encode($result);

?>