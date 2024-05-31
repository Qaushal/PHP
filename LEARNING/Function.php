<?php
function mark($markarr){
    $sum =0 ;
    foreach($markarr as $value){
        $sum += $value;
    }
    return $sum ;
}

$arr = [34,54,78,56,9,23];
$mark = mark($arr);
echo "Total mark is $mark<br>";
?>