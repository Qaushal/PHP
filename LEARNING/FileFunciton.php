<?php
//to fetch the file
$fptr = fopen("File.txt" , "r");

//  READING

//to read the file
// $content = fread($fptr,filesize("File.txt"));
// echo $content;

//to read only one line - use fgets
// echo fgets($fptr);

//to read the character  by character - use fgetc
// while($a = fgetc($fptr)){
//     echo $a;
// }

//WRITING

//to write in  file - use fwrite()
// $fwptr = fopen("File.txt" , "w");
// echo "WRITING";
// fwrite($fwptr,"WRITING FILE FUNCTION WILL OVERIDE THE CONTENT PRESENT IN THE FILE \n");


//to append in file
$faptr = fopen("File.txt" , "a");
echo "APPENDING";
fwrite($faptr,"I AM ATTACHED AT LAST AND DO NOT OVERIDE\n");
//to close the file
fclose($faptr);
?>