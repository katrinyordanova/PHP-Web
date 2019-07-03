<?php

$totalNumbers=intval(readline());
$sum=0;

for ($i=1;$i<=$totalNumbers*2;$i+=2){
    echo $i."\n";

    $sum+=$i;
}
echo 'Sum: '.$sum;