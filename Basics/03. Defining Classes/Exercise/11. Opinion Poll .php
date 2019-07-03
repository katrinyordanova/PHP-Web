<?php

class Person
{
    public $name;
    public $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public  function printResult(){
        return "$this->name - $this->age" .PHP_EOL;
    }
}

$totalInputs=intval(readline());
$information=[];

while ($totalInputs-- >0){

    $splitInput=explode(' ',readline());

    $name=$splitInput[0];
    $age=$splitInput[1];

    $information[]=new Person($name,$age);
}

$filterPeople=array_filter($information, function ($person){
    return $person->age>30;
});

usort($filterPeople,function ($firstPerson,$secondPerson){
    return $firstPerson->name <=> $secondPerson->name;
});

foreach ($filterPeople as $people) {
    echo $people->printResult();
}
