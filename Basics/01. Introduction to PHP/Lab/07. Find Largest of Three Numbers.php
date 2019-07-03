<?php

$firstNumber=intval(fgets(STDIN));
$secondNumber=intval(fgets(STDIN));
$thirdNumber=intval(fgets(STDIN));

$theBiggestNumber=max($firstNumber,$secondNumber,$thirdNumber);
echo $thirdNumber;