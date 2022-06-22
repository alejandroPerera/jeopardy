<?php
require_once 'wc3pka-Q3-session_create.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Temperature Comparation</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <style>
      .error {
         color: red;
         font-style: italic;
         font-size: 0.8em;
         padding-left: 16px;
      }
      .row {
          padding-bottom: 10px;
      }
      #compare {
          width: 100%;
          text-align: center;
      }
      .error_message {  color: crimson; font-style:italic; padding:10px; }
    </style>
  </head>
  <body>
    <?php
        $mon1_err = false;
        $tue1_err = false;
        $wed1_err = false;
        $thu1_err = false;
        $fri1_err = false;
        $not_finish = false;
        if($_SERVER['REQUEST_METHOD'] == "POST"){ 
            $mon1_err = false;
            $tue1_err = false;
            $wed1_err = false;
            $thu1_err = false;
            $fri1_err = false;
            $not_finish = false;
            if ($_POST['mon1'] == null || !is_numeric($_POST['mon1'])){
                $mon1_err = true;
                $not_finish = true;

            }
            if ($_POST['tue1'] == null || !is_numeric($_POST['tue1'])){
                $tue1_err = true;
                $not_finish = true;
            }
            if ($_POST['wed1'] == null || !is_numeric($_POST['wed1'])){
                $wed1_err = true;
                $not_finish = true;
            }
            if ($_POST['thu1'] == null || !is_numeric($_POST['thu1'])){
                $thu1_err = true;
                $not_finish = true;
            }
            if ($_POST['fri1'] == null || !is_numeric($_POST['fri1'])){
                $fri1_err = true;
                $not_finish = true;
            }
            if ($not_finish == false){
                setcookie('number', $_COOKIE['number'] + 1);
                $week1_avg = ($_POST['mon1'] + $_POST['tue1'] + $_POST['wed1'] + $_POST['thu1'] + $_POST['fri1']) / 5;
                $result = "You entered " . $_POST['mon1'] . "," . $_POST['tue1'] . "," . $_POST['wed1'] . ",". $_POST['thu1'] . "," .
                $_POST['fri1'] . "." . " Average is " . $week1_avg . "<br>"; 
                // echo $result; 
                $info = json_decode($_COOKIE['info']);
                array_push($info, $result);
                setcookie('info', json_encode($info), time()+3600); 
                // echo $_SESSION['number'];
                $_SESSION['info'] = $info;
                $_SESSION['number'] = $_COOKIE['number'];
            }
            else{
                $info = json_decode($_COOKIE['info']);
                setcookie('info', json_encode($info), time()+3600); 
                // echo $_SESSION['number'];
                $_SESSION['info'] = $info;
                $_SESSION['number'] = $_COOKIE['number'];
            }
            
        }
    ?>
    <div class="container">
      <h1 class="mt-3">Temperature Comparation</h1>
      <form name="mainform" action='wc3pka-Q3.php', method="post">
        <div class="row">
            <div class="col">
                <h2>First Week's Temperature (in Celsius)</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label>Monday:</label>
            </div>
            <div class="col-4">
                <input type="text" id="mon1" name="mon1" class="form-control" autofocus="">
                <?php 
                    if ($mon1_err){
                ?>
                    <span class="error_message" id="mon1_msg">Please enter a valide temperature number</span> 
                <?php
                    }
                ?>
                
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label>Tuesday:</label>
            </div>
            <div class="col-4">
                <input type="text" id="tue1" name="tue1" class="form-control" autofocus="">
                <?php 
                    if ($tue1_err){
                ?>
                    <span class="error_message" id="tue1_msg">Please enter a valide temperature number</span> 
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label>Wednesday:</label>
            </div>
            <div class="col-4">
                <input type="text" id="wed1" name="wed1" class="form-control" autofocus="">
                <?php 
                    if ($wed1_err){
                ?>
                    <span class="error_message" id="wed1_msg">Please enter a valide temperature number</span> 
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label>Thursday:</label>
            </div>
            <div class="col-4">
                <input type="text" id="thu1" name="thu1" class="form-control" autofocus="">
                <?php 
                    if ($thu1_err){
                ?>
                    <span class="error_message" id="thu1_msg">Please enter a valide temperature number</span> 
                <?php
                    }
                ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label>Friday:</label>
            </div>
            <div class="col-4">
                <input type="text" id="fri1" name="fri1" class="form-control" autofocus="">
                <?php 
                    if ($fri1_err){
                ?>
                    <span class="error_message" id="fri1_msg">Please enter a valide temperature number</span> 
                <?php
                    }
                ?> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <input type="submit" class="btn btn-primary" id="compare" value="submit">
            </div>
            <div class="col-4"></div>
        </div> 
        </form>
        <br>
        <div class="row">
            <h2>Results:</h2>
        </div>
        <div class="row">
            <?php
                foreach ($_SESSION['info'] as $item){
                    echo $item;
                }
            ?>
        </div>
        <div class="row">
            <div clss="col">
                <span id="week1"></span> 
            </div>
        </div>
        <div class="row">
            <div clss="col">
                <span id="week2"></span> 
            </div>
        </div>
        <div class="row">
            <div clss="col">
                <span id="conclusion"></span> 
            </div>
        </div>
            </div>
    
  </body>
  </html>