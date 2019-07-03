<?php
 
class Engine {
    private $model;
    private $engine;
    private $displacement;
    private $efficiency;
 
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
 
    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }
 
    /**
     * @return string
     */
    public function getDisplacement(): string
    {
        return $this->displacement;
    }
 
    /**
     * @return string
     */
    public function getEfficiency(): string
    {
        return $this->efficiency;
    }
 
    /**
     * Engine constructor.
     * @param $model
     * @param $engine
     * @param $displacement
     * @param $efficiency
     */
    public function __construct($model, $engine, $displacement='n/a', $efficiency='n/a')
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }
}
 
class Car {
    private $model;
    private $engine;
    private $weight;
 
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }
 
    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }
 
    /**
     * @return string
     */
    public function getWeight(): string
    {
        return $this->weight;
    }
 
    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }
    private $color;
 
    /**
     * Car constructor.
     * @param $model
     * @param $engine
     * @param $weight
     * @param $color
     */
    public function __construct($model, Engine $engine, $weight='n/a', $color='n/a')
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }
 
    public function __toString()
    {
        return "$this->model:".PHP_EOL.'  '.$this->engine->getModel().':'.PHP_EOL.
            '       Power: '.$this->engine->getEngine().PHP_EOL.
            '       Displacement: '.$this->engine->getDisplacement().PHP_EOL.
            '       Efficiency: '.$this->engine->getEfficiency().PHP_EOL.
            '   Weight: '.$this->weight.PHP_EOL.
            '   Color: '.$this->color.PHP_EOL;
    }
}
 
$firstNum = intval(readline());
$engines = [];
 
for ($i = 0; $i < $firstNum; $i++) {
    $input = explode(' ', readline());
    if (count($input) === 2) {
        $engine = new Engine($input[0],$input[1]);
    } else if (count($input) === 3) {
        if (is_numeric($input[2])) {
            $engine = new Engine($input[0],$input[1], $input[2]);
        } else {
            $engine = new Engine($input[0],$input[1],'n/a', $input[2]);
        }
    } else {
        $engine = new Engine($input[0],$input[1], $input[2], $input[3]);
    }
    $engines[] = $engine;
}
 
$firstNum = intval(readline());
$cars = [];

for ($i = 0; $i < $firstNum; $i++) {
    $input = array_filter(explode(' ', readline()));
 
    foreach ($engines as $engine) {
        if ($engine->getModel() == $input[1]) {
            if (count($input) == 2) {
                $car = new Car($input[0], $engine);
            } else if (count($input) == 3) {
                $car = new Car($input[0], $engine, 'n/a', $input[2]);
            } else {
                $car = new Car($input[0], $engine, $input[2], $input[3]);;
            }
        }
    }
    $cars[] = $car;
}
 
foreach ($cars as $car) {
    echo $car;
}