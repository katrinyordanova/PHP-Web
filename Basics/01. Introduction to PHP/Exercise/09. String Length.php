<?php

$string=readline();

if (strlen($string)>20)
{
    print substr($string,0,20);
}else {
    $stars=20-strlen($string);
    $result=str_repeat('*',$stars);
    print $string . $result;
}