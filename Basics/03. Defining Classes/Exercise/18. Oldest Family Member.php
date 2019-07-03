<?php

class Person {
    public $name;
    public $age;
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

class Family {
    public $members = [];
    function addMember($person){
        array_push($this->members,$person);
        usort($this->members,function ($a,$b){
           return $b->age <=> $a->age;
        });
    }
    function getOldestMember(){
        return $this->members[0];
    }
}

$num = intval(readline());
$family = new Family();

for($i=0; $i<$num; $i++){
    $input = explode(' ', readline());
    $per = new Person($input[0],intval($input[1]));
    $family->addMember($per);
}

$output = $family->getOldestMember();
echo $output->name.' '.$output->age;