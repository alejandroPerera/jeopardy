<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
  ob_start();
  if(session_status() === PHP_SESSION_NONE)
    session_start();
  
  require "update-handler.php"
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="styles/uva.png" height="30" style="border: 5px"/></a>
      
      <span class="navbar-text text-light">    
        <?php if(isset($_SESSION['first_name'])) { ?>
          <button id="modal-btn" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal"> 
            <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name'] ?> 
          </button>
        <?php } else { ?>
          Hello Stranger! 
        <?php } ?>
      </span> 

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <form method='GET' action='<?php $_SERVER['PHP_SELF'] ?>'>
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="modal-first-name" class="form-label">First Name</label>
                    <input required type="text" class="form-control" name="modal-first-name" id="modal-first-name" value="<?php echo $_SESSION['first_name']?>">
                  </div>
                  <div class="mb-3">
                    <label for="modal-last-name" class="form-label">Last Name</label>
                    <input required type="text" class="form-control" name="modal-last-name" id="modal-last-name" value="<?php echo $_SESSION['last_name']?>">
                  </div>
                  <div class="mb-3">
                    <label for="modal-email" class="form-label">Email</label>
                    <input required type="email" class="form-control" name="modal-email" id="modal-email" value="<?php echo $_SESSION['email']?>">
                  </div>

                  <div class="mb-3">
                    <label for="modal-current-pwd" class="form-label">Current Password</label><br/>
                    <input type="password" class="form-control" name="modal-current-pwd" id="modal-current-pwd">
                  </div>
                  <div class="mb-3">
                    <label for="modal-new-pwd" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="modal-new-pwd" id="modal-new-pwd">
                  </div>
                  
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Save Changes">                
                </div>
              </form>


            </div>
          </div>
        </div>

        <?php
          if(!$correct_pwd && $_SERVER['REQUEST_METHOD'] == 'GET'){
            $message = "Current password is not correct";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $correct_pwd = true;
          }
          $correct_pwd = true;
        ?>


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
              if(isset($_SESSION['email'])) { // COOKIES
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