<?php

$totalNumbers=intval(readline());
$numbers=array();

for ($i=0;$i<$totalNumbers;$i++){
    $newNumber=floatval(readline());
    $numbers[$i]=$newNumber;
}

$reversedArray=array_reverse($numbers);

for ($i = 0; $i < count($reversedArray); $i++)
{
	echo $reversedArray[$i] . " ";
}