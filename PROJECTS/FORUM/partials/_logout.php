<?php
session_start();
echo "Logout";

session_unset();
session_destroy();
header("location:/Kaushal/FORUM/index.php");
?>
