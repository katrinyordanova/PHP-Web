<?php

$strings=readline();
$splitArray=explode(' ',$strings);
$result='';

for ($i = 0; $i < count($splitArray); $i++)
{
	$length=strlen($splitArray[$i]);
    $repeat=str_repeat($splitArray[$i],$length);
    $result.=$repeat;
}

echo $result;