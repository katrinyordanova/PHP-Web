<?php

$writing=readline();
$combination=readline();
$letter=$combination[0];
$numberOfLetter=intval($combination[2]);
$counter=0;

for ($i = 0; $i < strlen($writing); $i++){
    if ($writing[$i]==$letter){
		$counter++;
		if ($counter==$numberOfLetter){
			echo $i;
			return;
		}
    }
}
    
echo 'Find the letter yourself!';