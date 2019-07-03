<?php

$groupSize=intval(readline());
$package=readline();
$price=0.0;
$discount=0.0;
$hall="";

if ($groupSize<=50)
{
    $price=2500;
    $hall="Small Hall";
}else if ($groupSize<=100){
    $price=5000;
    $hall="Terrace";
}else if ($groupSize<=120){
    $price=7500;
    $hall="Great Hall";
}else{
    echo  ("We do not have an appropriate hall.");
    return;
}


if ($package=="Normal")
{
    $price+=500;
    $discount=0.05;
}else if ($package=="Gold"){
    $price+=750;
    $discount=0.1;
}else if ($package=="Platinum"){
    $price+=1000;
    $discount=0.15;
}

$total=$price-($price*$discount);
$result=$total/$groupSize;

printf("We can offer you the $hall\n");
printf("The price per person is %.2f$",$result);