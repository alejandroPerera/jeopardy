<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  
  <title>PHP State Maintenance (Cookies)</title>     
</head>
<body>
  <?php 
  if (isset($_COOKIE['user']))
  {
  ?>
    
  <div class="container">
    <div style="float:right; padding:30px;">    
      <form action="logout.php" method="get">
        <input type="submit" value="Log out" class="btn btn-dark" />
      </form>
    </div>    
    
    <h1>Welcome <font color="green" style="font-style:italic"><?php 
      echo $_COOKIE['user'] . "<br/>";
    ?></font> </h1>
    <h3>Question 3: What's your name?</h3>
       
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <input type="text" name="your_name" class="form-control" autofocus required /> <br />
      <input type="submit" value="Submit" class="btn btn-light"  />   
    </form>
    <br/>
    Previous question: you answered <font color="green" style="font-style:italic"><?php if (isset($_COOKIE['lunch'])) echo $_COOKIE['lunch'] ?></font>
    <br/>
    Previous question: you answered <font color="green" style="font-style:italic"><?php if (isset($_COOKIE['cookies_secure'])) echo $_COOKIE['cookies_secure'] ?></font>         
    <?php }
    else{
      header("Location: login.php");
    }
    ?>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if (isset($_POST['your_name'])){
        setcookie('your_name', $_POST['your_name']);
        header("Location: question4.php");
      }
    }
    ?>
    
</body>
</html>
