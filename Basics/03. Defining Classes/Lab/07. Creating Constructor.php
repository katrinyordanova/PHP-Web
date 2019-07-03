<?php

class Person2{
	public $name;
	public  $age;

	public function __construct(){
		$this->name=readline();
		$this->age=readline();
		echo $this->name . ' ' . $this->age;
	}
}

$person2=new Person2();