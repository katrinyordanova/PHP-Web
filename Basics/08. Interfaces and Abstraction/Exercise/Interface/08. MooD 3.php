<?php

abstract class Characteristics{

    /**
     * @var string
     */
    private $username;

    /**
     * @var int
     */
    private $level;

    /**
     * @var float
     */
    private $points;

    /**
     * Characteristics constructor.
     * @param $username
     * @param $level
     * @param $points
     */
    public function __construct(string $username,int $level,float $points)
    {
        $this->username = $username;
        $this->level = $level;
        $this->points = $points;
    }

    //Getters
    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return float
     */
    public function getPoints()
    {
        return $this->points;
    }

    //Setters
    /**
     * @param string $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param int $level
     */
    public function setLevel($level): void
    {
        $this->level = $level;
    }

    /**
     * @param float $points
     */
    public function setPoints($points): void
    {
        $this->points = $points;
    }
}

interface Functionalities{
    function generatePassword(string $username);
}

class Archangel extends Characteristics implements Functionalities {

    public function __construct($username, $level, $points)
    {
        parent::__construct($username, $level, $points);
    }

    public function generatePassword(string $username)
    {
        return strrev($username).(strlen($username)*21);
    }
}

class Demon extends Characteristics implements Functionalities {

    public function __construct($username, $level, $points)
    {
        parent::__construct($username, $level, $points);
    }

    public function generatePassword(string $username)
    {
        return strlen($username)*217;
    }
}

$input=explode(" | ", readline());
$username=$input[0];
$points=floatval($input[2]);
$level=intval($input[3]);

//var_dump($input);

if ($input[1]=='Archangel'){
    $archangel=new Archangel($username,$level,$points);
    $archangel->generatePassword($username);
    echo '"'.$archangel->getUsername().'" | "'.$archangel->generatePassword($archangel->getUsername()).'" -> '.$input[1]."\n";
    echo $archangel->getLevel()*$archangel->getPoints();
}
else if ($input[1]=='Demon'){
    $demon=new Demon($username,$level,$points);
    $demon->generatePassword($username);
    echo '"'.$demon->getUsername().'" | "'.$demon->generatePassword($demon->getUsername()).'" -> '.$input[1]."\n";
    echo   number_format(($demon->getLevel()*$demon->getPoints()),1,'.','');
}