<?php

$string=readline();

while ($string!='end'){
    $reverse=strrev($string);
    echo $string . ' = '.$reverse . "\n";
    $string=readline();
}