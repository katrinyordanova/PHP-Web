<?php

$garbage=readline();

for ($i = 0; $i < strlen($garbage); $i++)
{
	if(is_numeric($garbage[$i])){
        $numbers.=$garbage[$i];
    }
    else if (ctype_alpha($garbage[$i]))
    {
        $letters.=$garbage[$i];
    }
    else{
        $others.=$garbage[$i];
    }
}

echo $numbers.PHP_EOL;
echo $letters.PHP_EOL;
echo $others.PHP_EOL;