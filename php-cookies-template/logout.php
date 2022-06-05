<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  
  <title>PHP State Maintenance (Cookies)</title>    
</head>
<body>
  
  <div class="container">
    <h1>CS4640 Survey</h1>
    Successfully logged out 
  </div>

  <?php
  if (count($_COOKIE) > 0){
    foreach ($_COOKIE as $key => $value){
      unset($_COOKIE[$key]);
      setcookie($key, '', time()-3600);
    }
    header('refresh:5; url=login.php');
  }
  ?>
</body>
</html>