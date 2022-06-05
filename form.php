<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Example: PHP form handling</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="activity-styles.css" />    
</head>
<body>
  <?php include 'form-handler.php'?>
  <div>  
  <h1>PHP: Form Handling</h1>
   
  <!-- what are form inputs -->
  <!-- who will handle the form submission -->
  <!-- how are the request sent -->
   
  <form action="form.php" method="post">
    <label>Name: </label>
    <span class="msg">
      <?php if (empty($_POST['name'])) echo $name_msg; ?>
    </span>
    <input type="text" name="name" <?php if (empty($_POST['name'])) { ?>autofocus <?php } ?>value="<?php if (isset($_POST['name'])) echo $_POST['name']?>"/> <br/>
    <label>Email:</label>
    <span class="msg">
      <?php if (empty($_POST['emailaddr'])) echo $email_msg; ?>
    </span>
    <input type="email" name="emailaddr" value="<?php if (isset($_POST['emailaddr'])) echo $_POST['emailaddr']?>" <?php if (empty($_POST['emailaddr'])) { ?>autofocus <?php } ?> /> <br/>
    <label>Comment: </label>
    <span class="msg">
      <?php if (empty($_POST['comment'])) echo $comment_msg; ?>
    </span>
    <textarea rows="5" cols="40" name="comment" <?php if (empty($_POST['comment'])) { ?>autofocus <?php } ?> ><?php if (isset($_POST['comment'])) echo $_POST['comment']?></textarea> <br/>
     
    <input type="submit" value="Submit" class="btn" />
  </form>
  <?php
    if ($error == false){
      echo "Name: $name <br/>";
      echo "Email: $email <br/>";
      echo "Comment: $comment <br/>";
    }  
  ?>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>