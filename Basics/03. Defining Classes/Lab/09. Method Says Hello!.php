<?php

class Person4{
    public $name;

    public function __construct(){
        $this->name=readline();
        echo $this->name . ' says "Hello"!';
    }
}

$person4 = new Person4();