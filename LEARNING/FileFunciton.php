<?php
//to fetch the file
$fptr = fopen("blog.txt" , "r");

//to read the file
$content = fread($fptr,filesize("blog.txt"));
echo $content;
?>