<?php

$input=explode(' ',readline());

sort($input);
$result=array_count_values($input);

foreach ($result as $key => $value)
{
    echo $key . ' -> ' . $value.PHP_EOL;
}