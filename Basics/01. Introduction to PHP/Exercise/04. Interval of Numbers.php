<?php

$firstNumber=intval(readline());
$secondNumber=intval(readline());

$biggerNumber=max($firstNumber,$secondNumber);
$smallerNumber=min($firstNumber,$secondNumber);

for ($i=$smallerNumber;$i<=$biggerNumber;$i++){
    echo $i . "\n";
}