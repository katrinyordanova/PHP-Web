<?php

$points=intval(readline());
$commands=explode(', ',readline());

$checkCommands=function ($points,$command){
    switch ($command){
        case 'chop';
            $points/=2;
            break;
        case 'dice';
            $points=sqrt($points);
            break;
        case 'spice';
            $points+=1;
            break;
        case 'bake';
            $points*=3;
            break;
        case 'fillet';
            $points-=($points*0.2);
            break;
        }
    return $points;
};

foreach ($commands as $command){
	$points=$checkCommands($points,$command);

    echo $points . PHP_EOL;
}