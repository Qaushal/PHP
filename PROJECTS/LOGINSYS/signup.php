<?php require './partials/_dbconnect.php'?>
<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  //check wherether username is exists 
  $existssql = "SELECT * FROM `contactform` WHERE `Username` LIKE '$username' ";
  $result = mysqli_query($conn,$existssql);
  $numExistRows = mysqli_num_rows($result);
  if($numExistRows>0){
    if(($password!=$cpassword)){
      $showError = "Username already exists and password do not match";
    }else{
    $showError = "Username already exists";
  }
}
  else{
  if(($password==$cpassword)){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `contactform` (`Srno`, `Username`, `Password`, `Date`) VALUES ('', '$username', '$hash', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    if($result){
      $showAlert=true;
    }
  }else{
    $showError="Password do not match";
    }

}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN-UP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php require './partials/_nav.php'?>

    <!-- Alert -->
    <?php
    if($showAlert){
   echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your Account has been Created successfully
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
    <h1 class="text-center">Sign Up to Our Website</h1>
        <form action = "/Kaushal/LOGINSYS/signup.php" method="POST">
  <div class="form-group ">
    <label for="username">Username</label>
    <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Maximum lenght should be 11">
    
  </div>
  <div class="form-group ">
    <label for="password">Password</label>
    <input type="password" maxlength="21" class="form-control" id="password" name="password" placeholder="Maximum lenght should be 21">
  </div>
  <div class="form-group ">
    <label for="cpassword">Confirm Password</label>
    <input type="password" maxlength="21" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Your Password">
  </div>
 
  <button type="submit" class="btn btn-primary mt-3 ">SignUp</button>
</form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

