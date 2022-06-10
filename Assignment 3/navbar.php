<?php
  if(session_status() === PHP_SESSION_NONE)
    session_start();
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="styles/uva.png" height="30" style="border: 5px"/></a>
      
      <span class="navbar-text">
        Hello <?php if(isset($_SESSION['first_name'])) echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?> 
      </span>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav ms-auto nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link" id="homepage-tab" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id='create-tab' href="creategame1.php">Create</a>
            </li>
            
            <?php
              if(isset($_COOKIE['email'])) { // COOKIES
            ?>
              <li class="nav-item">
                <a class="nav-link" id='login-tab' href="logout.php">Sign Out</a>
              </li>
            <?php 
              }
              else {
            ?>
            <li class="nav-item">
                <a class="nav-link" id='login-tab' href="login.php">Sign In</a>
            </li>
            <?php } ?>

        </ul>
      </div>
    </div>
   </nav>