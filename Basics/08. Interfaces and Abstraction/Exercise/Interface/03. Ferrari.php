<?php
class Driver{
    protected $person;

    /**
     * Driver constructor.
     * @param $person
     */
    public function __construct($person)
    {
        $this->person = $person;
    }

    function getPerson(){
       return $this->person;
    }
}

interface Functionality{
    function brakes();

    function gasPedal();
}

class Ferrari implements Functionality {
    public function brakes()
    {
        return 'Brakes!';
    }

    public function gasPedal()
    {
       return 'Zadu6avam sA!';
    }
}

$input=readline();
$driver=new Driver($input);
$ferrari=new Ferrari();
echo '488-Spider/'.$ferrari->brakes().'/'.$ferrari->gasPedal().'/'.$driver->getPerson();