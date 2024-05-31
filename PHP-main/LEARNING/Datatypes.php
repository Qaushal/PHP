<?php   
/*
Types : 
1. integer
2. float
3. string
4. boolean
5. array
6. object
7. resource -> Resource variables hold special handles to opened files, database connections, streams
8. NULL

NOTE : NO CHAR DATATYPE IN PHP
*/


//String
$name = "kaushal";
$surname = 'kalariya';
//integer
$age = 20;
//float
$percentage = 99.99;
//boolean
$male = true;
$female = false;
echo "Gender is : $male<br>";
echo var_dump($female);  //var_dump return variable type
echo "<br>";
//array
$friend = array("rohan","sohan","mohan","johan");
echo var_dump($friend);
echo "<br>";
echo $friend[0];    
echo "<br>";
echo $friend[1];
echo "<br>";
echo $friend[2];
echo "<br>";
echo $friend[3];
echo "<br>";
//resource
// $connection = ftp_connect("127.45.6.2") or die("Error : 404");
// echo var_dump($connection);

//object
echo "<br>";
$myobject = new stdClass();
$myobject->myvalue = 'Hello World';
$myarray = [ "Hello", "World" ];
$mystring = "Hello World";
$myint = 42;
// Using print_r we can view the data the array holds.
print_r($myobject);
print_r($myarray);
print_r($mystring);
print_r($myint);
echo "<br>";

?>