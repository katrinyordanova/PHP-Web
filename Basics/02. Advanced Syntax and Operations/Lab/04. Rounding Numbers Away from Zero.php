<?php

$numbers=readline();
$breakThem=explode(' ',$numbers);

for ($i = 0; $i < count($breakThem); $i++)
{
    $result=round($breakThem[$i],0,PHP_ROUND_HALF_UP);
    echo $breakThem[$i] . ' => ' .$result."\n";
}