<?php require './partials/_dbconnect.php'?>
<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  $username = $_POST["username"];
  $password = $_POST["password"];
    $sql = "SELECT * FROM `contactform` WHERE Username='$username'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num){
      while($row=mysqli_fetch_assoc($result)){
        if(password_verify($password , $row['Password'])){
      $login=true;
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['username']=$username;
      header("location: welcome.php");
      }
      else{
        $showError="Invaild Credentials";
        }
    }
    }
   else{
    $showError="Invaild Credentials";
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php require './partials/_nav.php'?>

    <!-- Alert -->
    <?php
    if($login){
   echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are Login 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>';
    }
    if($showError){
   echo' <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Failure! </strong>'.$showError.' 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>';
    }
?>
    <!-- form -->
    <div class="container my-4  ">
    <h1 class="text-center">Login to Our Website</h1>
        <form action = "/Kaushal/LOGINSYS/login.php" method="POST">
  <div class="form-group ">
    <label for="username">Username</label>
    <input type="text" class="form-control" maxlength="11"  id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Your Username">
    
  </div>
  <div class="form-group ">
    <label for="password">Password</label>
    <input type="password" class="form-control" maxlength="21"  id="password" name="password" placeholder="Password">
  </div>
 
 
  <button type="submit" class="btn btn-primary mt-3 ">Login</button>
</form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

