<?php

$input=explode(', ',readline());
$arrays=intval($input[0]);
$numbersInArray=intval($input[1]);
$newArray=[];

$min=PHP_INT_MAX;
$max=PHP_INT_MIN;

for ($k = 0; $k < $arrays; $k++){
	$newArray[$k]=array_map("intval",explode(', ',readline()));
}

for ($i = 0; $i < count($newArray); $i++){
	for($j = 0; $j < count($newArray[$i]); $j++){
        $element=$newArray[$i][$j];
        if ($element<$min){
        	$min=$element;
        }
        if ($element>$max){
        	$max=$element;
        }

    }
}

echo 'Min: ' . $min. PHP_EOL;
echo 'Max: ' . $max;