<?php

function isInside($x,$y,$z){
    $x1=10;
    $x2=50;
    $y1=20;
    $y2=80;
    $z1=15;
    $z2=50;

    if($x >= $x1 && $x <= $x2 && $y>=$y1 && $y <= $y2 && $z >= $z1 && $z<= $z2) {
         return true;
    }

    return false;
}

$input=explode(', ',readline());

for ($i=0;$i<count($input);$i+=3){
    $x=$input[$i];
    $y=$input[$i+1];
    $z=$input[$i+2];

    if (isInside($x,$y,$z)){
        echo 'inside' .PHP_EOL;
    }
    else {
        echo 'outside' . PHP_EOL;
    }
}