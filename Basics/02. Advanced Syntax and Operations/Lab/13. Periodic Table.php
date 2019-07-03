<?php

$input=explode(', ',readline());
$uniqueElements=[];

foreach (array_count_values($input) as $key => $value){
	if ($value==1){
    	$uniqueElements[]=$key;
    }
}

foreach ($uniqueElements as $elements)
{
	echo $elements . ' ';
}