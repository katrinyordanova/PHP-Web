<?php

$numbers=readline();
$digits=(explode(' ',$numbers));
$arrayOfNumbers=array_map('intval',$digits);
$isFound=false;

for ($i = 0; $i < count($arrayOfNumbers); $i++)
{
    for ($j = $i+1; $j < count($arrayOfNumbers); $j++)
    {
		$sum=$arrayOfNumbers[$i]+$arrayOfNumbers[$j];
		
        if (in_array($sum,$arrayOfNumbers)){
			echo "{$arrayOfNumbers[$i]} + $arrayOfNumbers[$j] == $sum\n";
			$isFound=true;
		}
    }
}

if (!$isFound)
{
    echo 'No';
}