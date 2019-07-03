<?php
interface Person
{
    function  setName();
    function setAge();
}

 class Citizen implements Person{
    protected $name;
    protected $age;

     /**
      * Citizen constructor.
      * @param $name
      * @param $age
      */
     public function __construct($name, $age)
     {
         $this->name = $name;
         $this->age = $age;
     }

     public function setName()
    {
        return $this->name;
    }

    public function setAge()
    {
       return $this->age;
    }
    
    public function __toString()
    {
        return $this->name."\n".$this->age;
    }
 }
 $name=readline();
$age=readline();

$citizen=new Citizen($name,$age);
echo $citizen;