<?php

class DecimalNumber
{
    public $number;

    /**
     * DecimalNumber constructor.
     * @param $number
     */
    public function __construct($number){
        $this->number = $number;
    }

    public function ReverseNumbers(){
        return strrev($this->number);
    }
}

$input=readline();
$number=new DecimalNumber($input);
echo $number->ReverseNumbers();