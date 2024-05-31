<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="dbkaushal";
$conn = mysqli_connect($servername,$username,$password,$database);
//UPDATE AGE IF  AGE<19
$sql = "UPDATE `survey` SET `Age` = '0' WHERE `Age` > '19';";
$result = mysqli_query($conn,$sql);
$numrow = mysqli_affected_rows($conn);
echo "<br>";
echo "AFFECTED ROWS ARE : " . $numrow ; 

?>