<?php

$name=readline();
$age=intval(readline());
$grade=floatval(readline());
$studentInformation=array();

echo 'Name: '.$name. ', ';
echo 'Age: ' .$age .', ';
printf('Grade: %0.2f',$grade);