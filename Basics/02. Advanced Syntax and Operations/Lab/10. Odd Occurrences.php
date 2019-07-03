<?php

$string=strtolower(readline());
$input=explode(' ',$string);
$occurrences=[];
$result=[];

for ($i = 0; $i < count($input); $i++){
    $element=$input[$i];
	if (!isset($element)){
    	$occurrences[$element]=1;
    }
    else{
    	$occurrences[$element]++;
    }
}
foreach ($occurrences as $key => $value)
{
	if($value%2==1){
        $result[].=$key;
    }

}

echo join(', ',$result);