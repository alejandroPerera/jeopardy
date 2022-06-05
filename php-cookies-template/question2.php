<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
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
    <h3>Question 2: [True or False] State maintenance with Cookies is secure?</h3>
       
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">      
      <input type="radio" name="cookies_secure" value="true" checked> True<br />
      <input type="radio" name="cookies_secure" value="false"> False <br />
      <input type="submit" value="Submit" class="btn btn-light"  />   
    </form>
    <br/>
    Previous question: you answered <font color="green" style="font-style:italic"><?php if (isset($_COOKIE['lunch'])) echo $_COOKIE['lunch'] ?></font>

  </div>
  <?php }
  else{
    header("Location: login.php");
  }
  ?>
  <?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['cookies_secure'])){
      setcookie('cookies_secure', trim($_POST['cookies_secure']));
      header("Location: question3.php");
    }
  }
  ?>
</body>
</html>
