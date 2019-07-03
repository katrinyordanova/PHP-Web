<?php

$string=readline();
$countedLetters=[];

for ($i = 0; $i < strlen($string); $i++){
	if (!isset($string[$i])){
    	$countedLetters[$string[$i]]=1;
    }
    else{
    	$countedLetters[$string[$i]]++;
    }

}

foreach ($countedLetters as $key => $value)
{
	echo $key . ' -> ' . $value . "\n";
}