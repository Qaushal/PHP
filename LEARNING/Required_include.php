<?php
// include 'Database.php';
require 'Database.php';
$sql = "SELECT * FROM SURVEY";
$result = mysqli_query($conn,$sql);

//find no of rows
$numrow = mysqli_num_rows($result);

//display data
if($numrow == 0) {
    die("NO DATA TO DISPLAY");
}
else{
    while($numrow = mysqli_fetch_assoc($result)){
        echo "Hello ". $numrow['Name'] ." Welcome to " . $numrow['City']  ;
        echo "<br>";
    }
}

?>