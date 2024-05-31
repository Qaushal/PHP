<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET POST</title>
</head>
<body>
    <div class="container ">
<form action = "/Kaushal/GET_POST.php" method="POST" >
  <div class="form-group">
    <label for="exampleInputEmail1 ">Email address</label>
    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
$email = $_POST['email'];
$password = $_POST['password'];
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Sucessfull</strong>
<button type="submit" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}
?>
</div>
</body>
<script>
  
</script>
</html>