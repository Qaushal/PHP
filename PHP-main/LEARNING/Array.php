<?=
$num = array(1,2,3);
echo var_dump($num) . "<br>";
echo $num[0] . "<br>";
echo $num[1] . "<br>";
echo $num[2] . "<br>";

$random = ["kaushal" , true , 12 , 100=>10];
echo var_dump($random) . "<br>";
echo $random[0] . "<br>";
echo $random[1] . "<br>";
echo $random[2] . "<br>";
echo $random[3] . "<br>";

//Associative array
$favcol = array(
    "kaushal" => "blue",
    "sagar" => "red",
    "moti" => "black"
    
);
echo var_dump($favcol);
echo"<br>";
foreach ($favcol as $key=>$value ){
    echo $key . " " . $value . "<br>";
}

$multi = array(array(1,2,3,4),array(5,6,7,8),array(9,10,11,12));
print_r($multi);
echo"<br>";

for($i=0;$i<count($multi);$i++){
    for($j=0;$j<count($multi[$i]);$j++){
        echo $multi[$i][$j] . " ";
    }
    echo "<br>";
}
?>