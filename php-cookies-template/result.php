<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  
  <title>PHP State Maintenance (Cookies)</title>    
    <style>
      a:hover { background-color:white; }
    </style>
</head>
<body>
  <?php 
  if (isset($_COOKIE['user']))
  {
  ?>
  <div class="container">
  
    <h1>Well done, <font color="green" style="font-style:italic">
    <?php 
      echo $_COOKIE['user'] . "<br/>";
    ?>
    </font></h1>
    <p>
      The purpose of this activity is
      to help you practice and experience state management mechanism in PHP.      		       
      You will use cookies to maintain information (i.e., state) among HTTP requests.
    </p>
    <p>
      To complete this activity, you will implement an online survey. 
      The survey consists of at least 4 questions, each of which is displayed on a separated screen.
      You are free to create any questions of your choices. 
      The only constraint is that the questions must be appropriate for college students and classroom environment.
    </p>
    <p>
      You may format the screens as you wish as long as you
      follow the usability guidelines from class. Get creative. 
      Feel free to add additional elements you feel should be included and have fun!
    </p>
    <p>
        <a href="logout.php">log out</a>.     
    </p>
  
</div>
  
  <br/>
  <?php }
  else {
    header("Location: login.php");
  }
  ?>
</body>
</html>