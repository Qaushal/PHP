<?php
//CREATE CONNECTION 
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbkaushal"; //database name

//CONNECTING CONNECTION
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn) die("CONNECTION FAILED : " . mysqli_connect_error());
echo "CONNECTION IS SUCESSFUL";

echo "<br>";
//CREATE DB
// $sql="CREATE DATABASE dbname";

//CREATE TABLE IN DB
//$sql=""CREATE TABLE `dbkaushal`.`example` (`Srno` INT NOT NULL AUTO_INCREMENT , `Name` VARCHAR(10) NOT NULL , `Age` INT(2) NOT NULL , `City` VARCHAR(10) NOT NULL , PRIMARY KEY (`Srno`)) ENGINE = InnoDB;

//INSERT INTO TABLE
// $sql = "INSERT INTO `survey` (`Srno`, `Name`, `Age`, `City`) VALUES ('', 'Raj', '20', 'Chennai');

//STORES ANY SQL QUERY AND PASS TO mysqli_query function........


// $result = mysqli_query($conn,$sql);
// if(!$result) die("DATA IS NOT INSERTED");
// echo "DATA :  " .$sql .  " IS INSERTED";
// echo "<br>";
?>