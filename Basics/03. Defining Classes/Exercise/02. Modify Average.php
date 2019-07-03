<?php

$number=readline();
$digits=str_split($number);
$mapNumbers=array_map('intval',$digits);

$check = function($mapNumbers){
    return array_sum($mapNumbers)/count($mapNumbers);
};

while (true){
$argv=$check($mapNumbers); 
 
    if ($argv>5){
        echo implode('',$mapNumbers);
        break;
    }
    else{
        array_push($mapNumbers,9);
    }
}