<?php

$numbers=intval(readline());

for ($i=1;$i<=$numbers;$i++){
    $firstDigit=intval($i/10);
    $lastDigit=$i%10;

    if ($firstDigit+$lastDigit==5 or $firstDigit+$lastDigit==7 or $firstDigit+$lastDigit==11)
    {
    echo $i . ' -> ' . 'True'. "\n";
    }
    else
    {
    	echo $i . ' -> ' . 'False' ."\n";
    } 
}