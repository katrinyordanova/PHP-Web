<?php

$input=explode(', ',readline());
$size=intval($input[0]);
$pattern=strtolower($input[1]);

$count=1;
$matrix=[];

switch ($pattern){
    case 'a':
        for ($i = 0; $i < $size; $i++)
        {
        	for ($j = 0; $j < $size; $j++)
            {
                $matrix[$j][$i]=$count++;
            }
        }

        printMatrix($matrix);
        break;
    case 'b':
        for ($i = 0; $i < $size; $i++){
        	for ($j = 0; $j < $size; $j++){
                if ($i%2==0){
                    $matrix[$j][$i]=$count++;
                }
                else{
                	$matrix[$size-1-$j][$i]=$count++;
                }              
            }
        }

        printMatrix($matrix);
        break;
    case 'c':
        for ($i = 0; $i < $size; $i++){
        	for ($j = 0; $j < $size; $j++){
                $matrix[$i][$j]=$count++;
            }
        }
        printMatrix($matrix);
        break;
}

function printMatrix($matrix){
    for ($i = 0; $i <= count($matrix); $i++){
        for ($j = 0; $j <= count($matrix[$i]); $j++){
            echo  $matrix[$i][$j] . ' ';
        }
        echo PHP_EOL;
    }
}