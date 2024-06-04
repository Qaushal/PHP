<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbkaushal";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
die("ERROR");
}
?>