<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>PHP: Form handling</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="activity-styles.css" /> 
</head>
<body>  
  <?php include "header.html"?>
  <div>  
    <h1>PHP: Form Handling</h1>
    <form action="login.php" method="post">     
      Username: <input type="text" name="name" required /> <br/>
      Password: <input type="password" name="pwd" required /> <br/>
      <input type="submit" value="Submit" class="btn" />
    </form>
  </div>
  <?php
    function authenticate(){
      $hash = '$2y$10$9HbwQDhaItnR.398nPHiX.0yxTk3SF/h3fGYx/gVHmmYE75nSWLnW';
      // password_verify($_POST['pwd'], $hash);
      $pwd = htmlspecialchars($_POST['pwd']);
      if (password_verify($pwd, $hash)){
        header("Location: form.php");
      }
      else{
        echo "not match";
      }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      authenticate();
    }
  ?>

  <?php include "footer.html"?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>