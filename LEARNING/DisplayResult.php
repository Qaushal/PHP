<?php
//connect db
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbkaushal";
$conn = mysqli_connect($servername,$username,$password,$database);

//query
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
        print_r($numrow);
        echo "<br>";
    }
}
?>