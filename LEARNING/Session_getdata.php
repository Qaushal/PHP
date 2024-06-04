<?php
session_start();
if(isset($_SESSION['username'])){
    echo "  Welcome ! " . $_SESSION['username'] . "<br> Your favorite movie is " . $_SESSION['category'];
}
else{
    echo "PLEASE LOGIN AGAIN";
}
?>