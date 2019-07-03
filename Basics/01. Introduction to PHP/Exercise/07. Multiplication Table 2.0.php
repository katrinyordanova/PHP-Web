<?php

$input=intval(readline());
$multiplier=intval(readline());

if ($multiplier>10){
    echo $input . ' X ' . $multiplier . ' = '.$input*$multiplier;
    return;
}
for ($i=$multiplier;$i<=10;$i++){

    echo $input . ' X ' . $i . ' = '.$i*$input."\n";
}