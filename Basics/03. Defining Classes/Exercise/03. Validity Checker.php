<?php

$inputCoordinates = trim(fgets(STDIN));
$inputCoordinates = explode(", ", $inputCoordinates);
list($x1, $y1, $x2, $y2) = $inputCoordinates;
$startX = 0;
$startY = 0;
printMessage($x1, $y1, $startX, $startY);
printMessage($x2, $y2, $startX, $startY);
printMessage($x1, $y1, $x2, $y2);

function isDistanceValid($x1, $y1, $x2, $y2){
    $distance = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
	
    if ($distance == intval($distance)) {
        return true;
    }

    return false;
}

function printMessage($x1, $y1, $x2, $y2)
{
    if (isDistanceValid($x1, $y1, $x2, $y2)) {
        echo '{' . $x1 . ', '. $y1 . '} to {' . $x2 . ', ' . $y2 .'} is valid'.PHP_EOL;
    }else {
        echo '{' . $x1 . ', '. $y1 . '} to {' . $x2 . ', ' . $y2 .'} is invalid'.PHP_EOL;
    }
}