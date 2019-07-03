<?php

class Car {
    public $model;
    public $fuel;
    public $fuelPerKm;
    public $distance = 0;
	
    public function __construct($model, $fuel, $fuelPerKm)
    {
        $this->model = $model;
        $this->fuel = $fuel;
        $this->fuelPerKm = $fuelPerKm;
    }
	
    function checkMove($d){
        $fuelNeeded = round($d * $this->fuelPerKm,2);
        if(round($this->fuel,2)>=$fuelNeeded){
            $this->distance += $d;
            $this->fuel -= $fuelNeeded;
            return;
        } else {
            echo 'Insufficient fuel for the drive'.PHP_EOL;
            return;
        }
    }
	
    function printCar() {
        echo $this->model.' '.number_format(abs($this->fuel),2,'.','')
            .' '.$this->distance.PHP_EOL;
    }
}

$n = intval(readline());
$cars =[];

for($i=0; $i<$n; $i++){
    list($name,$fuel, $fuelPerKm) = explode(' ',readline());
    $fuel = floatval($fuel);
    $fuelPerKm = floatval($fuelPerKm);
    $car = new Car($name,$fuel,$fuelPerKm);
    array_push($cars,$car);
}

$command = readline();

while ($command!=='End'){
    list($com,$model,$dist) = explode(' ',$command);
    $dist = floatval($dist);
    foreach ($cars as $c) {
        if($c->model === $model){
            $c->checkMove($dist);
        }
    }
    $command = readline();
}

foreach ($cars as $c) {
    $c->printCar();
}