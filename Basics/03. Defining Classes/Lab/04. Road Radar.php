<?php

function getLimit($area){
    switch ($area){
        case 'motorway': return 130;
        case 'interstate': return 90;
        case 'city': return 50;
        case 'residential': return 20;
        default: return 'Not a valid input!';
    }
}

$currentSpeed=floatval(readline());
$area=readline();
$speedLimit=getLimit($area);
$fine=payFine($currentSpeed,$speedLimit);
echo $fine;


function payFine($currentSpeed,$speedLimit){
    $overTheLimit=$currentSpeed-$speedLimit;

    if ($overTheLimit>=0 and $overTheLimit<=20){
        return "speeding";
    }
    else if ($overTheLimit>20 and $overTheLimit<=40){
        return 'excessive speeding';
    }
    else if($overTheLimit>40){
        return 'reckless driving';
    }
    else{
    	exit;
    }   
}