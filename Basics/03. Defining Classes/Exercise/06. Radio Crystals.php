<?php

$input = array_map('intval',explode(', ',readline()));
$target = array_shift($input);

for ($i=0; $i<count($input); $i++){
    $quartz = $input[$i];
    echo "Processing chunk $quartz microns".PHP_EOL;
    if($quartz/4>=$target){
        $quartz = cut($target,$quartz);
    }if(($quartz - 0.2*$quartz)>=$target){
        $quartz = lap($target,$quartz);
    }if(($quartz - 20)>=$target){
        $quartz = grind($target,$quartz);
    }if(($quartz - 2)>=$target || ($quartz - 2)>=$target-1){
        $quartz = etch($target,$quartz);
    }if($quartz == $target-1){
        echo 'X-ray x1'.PHP_EOL;
    }
    echo "Finished crystal $target microns".PHP_EOL;
}

function cut($target,$quartz){
    $count = 0;
    while ($quartz/4 >= $target){
        $quartz = $quartz/4;
        $count++;
    }
    echo 'Cut x'.$count.PHP_EOL.'Transporting and washing'.PHP_EOL;
    return intval($quartz);
}

function lap($target,$quartz){
    $count = 0;
    while (($quartz - 0.2*$quartz) >= $target){
        $quartz-=0.2*$quartz;
        $count++;
    }
    echo 'Lap x'.$count.PHP_EOL.'Transporting and washing'.PHP_EOL;
    return intval($quartz);
}

function grind($target, $quartz){
    $count = 0;
    while (($quartz - 20) >= $target){
        $quartz-=20;
        $count++;
    }
    echo 'Grind x'.$count.PHP_EOL.'Transporting and washing'.PHP_EOL;
    return intval($quartz);
}

function etch($target, $quartz){
    $count = 0;
    while (($quartz - 2) >= $target || ($quartz - 2) >= $target-1){
        $quartz-=2;
        $count++;
    }
    echo 'Etch x'.$count.PHP_EOL.'Transporting and washing'.PHP_EOL;
    return intval($quartz);
}