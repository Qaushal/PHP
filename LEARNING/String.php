<?php
$name = "kaushal";
echo "$name<br>";
$fullname = "kaushal S. kalariya";
echo $fullname;
echo "<br>";
echo "the length of " . "my name is " . strlen($name);  // . is used to concat the strings
echo "<br>";
echo "Total word count in my fullname : " . str_word_count($fullname);
echo "<br>";
echo strrev($name);
echo "<br>";
echo "Position of Char[S.] in fullname is : ". strpos($fullname, "S.");
echo "<br>";
echo "Replace my name from $name to " .str_replace("kaushal" , "Qaushal" , $name);
echo "<br>";
echo str_repeat($name,10);
echo "<br>";
echo 'hello my name is $name';  //single quote cannot interpret the variable and escape character
echo "<br>";

echo "<br>";
?>
