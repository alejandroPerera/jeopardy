<?php
ob_start();
session_start();
$_SESSION['info'] = array();
$_SESSION['number'] = 0;
setcookie('number', 0, time()+3600);
$info = array();
setcookie('info' , json_encode($info), time()+3600);

?>