<?php

$arrays=intval(readline());
$leftDiagonal=0;
$rightDiagonal=0;
$difference=0;

for ($i = 0; $i < $arrays; $i++){
	$newArrays[$i]=explode(' ',readline());
}

for ($i = 0; $i < count($newArrays); $i++){
	$leftDiagonal+=$newArrays[$i][$i];
    $rightDiagonal+=$newArrays[$i][count($newArrays)-$i-1];
}

$biggerSum=max($leftDiagonal,$rightDiagonal);
$smallerSum=min($leftDiagonal,$rightDiagonal);

echo $biggerSum-$smallerSum;