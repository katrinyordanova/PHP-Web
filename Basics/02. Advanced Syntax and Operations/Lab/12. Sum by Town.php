<?php

$input=readline();
$splitInput=explode(', ',$input);
$newArray=[];

for ($i = 0; $i < count($splitInput); $i+=2){
    $town=$splitInput[$i];
    $income=$splitInput[$i+1];

	if (!isset($town)){
        $newArray[$town]=$income;
    }
    else{
        $newArray[$town]+=$income;
    }

}

foreach ($newArray as $key => $value)
{
	echo $key.' => '.$value.PHP_EOL;
}