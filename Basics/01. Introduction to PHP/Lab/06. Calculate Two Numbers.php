<?php

$firstNumber=intval(readline());
$secondNumber=intval(readline());
$operation=readline();

if ($operation!='subtract' && $operation!='sum' && $operation!='divide' && $operation!='multiply'){
    echo 'Wrong operation supplied';
}
else  {
    if ($operation=='subtract'){
        echo $firstNumber-$secondNumber;
    }
    else if ($operation=='sum'){
        echo $firstNumber+$secondNumber;
    }
    else if ($operation=='divide'){
        if ($firstNumber==0 or $secondNumber==0 or($firstNumber==0 and $secondNumber==0)){
            echo 'Cannot divide by zero';
            return;
        }
        echo $firstNumber/$secondNumber;
    }else if ($operation=='multiply'){
        echo $firstNumber*$secondNumber;
    }
}