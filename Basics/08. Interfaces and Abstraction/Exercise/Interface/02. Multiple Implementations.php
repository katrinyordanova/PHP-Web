<?php
interface Identifiable{
    function setId();
}

interface Birthable{
    function setBirthday();
}

interface Person
{
    function  setName();
    function setAge();
}

 class Citizen implements Person,Identifiable ,Birthable {
    protected $name;
    protected $age;
    protected $id;
    protected $birthDate;

     /**
      * Citizen constructor.
      * @param $name
      * @param $age
      * @param $id
      * @param $birthDate
      */
     public function __construct($name, $age,$id,$birthDate)
     {
         $this->name = $name;
         $this->age = $age;
         $this->id=$id;
         $this->birthDate=$birthDate;
     }

     public function setName()
    {
        return $this->name;
    }

    public function setAge()
    {
       return $this->age;
    }

    public function setId()
    {
        return $this->id;
    }

    public function setBirthday()
    {
        return $this->birthDate;
    }

     public function __toString()
    {
        return $this->name."\n".$this->age."\n".$this->id."\n".$this->birthDate;
    }
 }

$name=readline();
$age=readline();
$id=readline();
$birthDate=readline();

$citizen=new Citizen($name,$age,$id,$birthDate);
echo $citizen;