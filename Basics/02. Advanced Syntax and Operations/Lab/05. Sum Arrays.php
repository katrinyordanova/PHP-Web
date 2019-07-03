<?php

$firstInput=readline();
$break1=explode(' ',$firstInput);
$firstArray=array_map('intval',$break1);

$secondInput=readline();
$break2=explode(' ',$secondInput);
$secondArray=array_map('intval',$break2);

$sum=max(count($firstArray),count($secondArray));

for ($i = 0; $i < $sum; $i++){
    $firstValue=$firstArray[$i%count($firstArray)];
    $secondValue=$secondArray[$i%count($secondArray)];
    printf("%u ",$firstValue+$secondValue);
}