<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>
<body>
    <div class="container">
        <h1>ENTER YOUR DETAILS</h1>
<form action = "/Kaushal/FORM.php" method="POST" >
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="Name" name = "Name" class="form-control" id="Name" placeholder="Enter Your Name">
    <label for="Age">Age</label>
    <input type="Age" name = "Age" class="form-control" id="Age" placeholder="Enter Your Age">
    <label for="City">City</label>
    <input type="City" name = "City" class="form-control" id="City" placeholder="Enter Your City Name">
 
  <button type="submit" class="btn btn-primary mt-4 ">Submit</button>
</form>
</div>
</body>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
$name = $_POST['Name'];
$age = $_POST['Age'];
$city = $_POST['City'];
//CONNECTING TO DB
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbkaushal";
$conn = mysqli_connect($servername, $username, $password,$database);
//Query
$sql = "INSERT INTO `survey` (`Srno`, `Name`, `Age`, `City`) VALUES ('', '$name', '$age', '$city')";
$result = mysqli_query($conn,$sql);

if(!$result) {die('<div class="alert alert-warning" role="alert">
<h4 class="alert-heading">Succesfull</h4>');}
echo '<div class="alert alert-success" role="alert">
<h4 class="alert-heading">Succesfull</h4>';


}

?>
</html>