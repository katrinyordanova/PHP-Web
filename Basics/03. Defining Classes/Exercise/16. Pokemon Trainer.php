<?php

class Trainer{

    public $name;
    public $numberOfBadges;
    public $pokemons=[];

    public function __construct(string $name,int $numberOfBadges=0){
        $this->name=$name;
        $this->numberOfBadges=$numberOfBadges;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setNumberOfBadges(int $numberOfBadges)
    {
        $this->numberOfBadges = $numberOfBadges;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getNumberOfBadges(): int
    {
        return $this->numberOfBadges;
    }
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    public function addBadges(){
        $this->numberOfBadges++;
    }

    public function addPokemons(Pokemon $pokemons){
        $this->pokemons[]=$pokemons;
    }

    public function addPokemonToCollection($collection){
        $this->pokemons=$collection;
    }

    public function countPokemons(){
        return count($this->pokemons);
    }
}

class Pokemon{
    public $name;
    public $element;
    public $health;

    public function __construct(string $name, string $element, int $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getElement(): string
    {
        return $this->element;
    }
    public function setElement(string $element)
    {
        $this->element = $element;
    }
    public function getHealth(): int
    {
        return $this->health;
    }
    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    public function reduceHealth(){
        $this->health-=10;
    }
}

$trainerNames=[];
$trainersAndTheirPokemons=[];

while(true){
    $input=readline();

    if ($input=='Tournament')
    {
    	break;
    }

    $data=explode(' ',$input);
    $trainerName=$data[0];
    $pokemonName=$data[1];
    $pokemonElement=$data[2];
    $pokemonHealth=intval($data[3]);

    if (!in_array($trainerName,$trainerNames))
    {
    	$pokemons=new Pokemon($pokemonName,$pokemonElement,$pokemonHealth);
        $trainers=new Trainer($trainerName);
        $trainerNames[]=$trainerName;
        $trainersAndTheirPokemons[]=$trainers;
        $trainers->addPokemons($pokemons);
    }
    else
    {
    	$pokemons=new Pokemon($pokemonName,$pokemonElement,$pokemonHealth);

        foreach ($trainersAndTheirPokemons as $trainersAndTheirPokemon)
        {
            if ($trainerName==$trainersAndTheirPokemon->getName())
            {
                $trainersAndTheirPokemon->addPokemons($pokemons);
            }
        }
    }
}

while(true){
    $input=readline();

    if ($input=='End')
    {
    	break;
    }

    foreach ($trainersAndTheirPokemons as $trainersAndTheirPokemon)
    {
    	$pokemonsByTrainer=$trainersAndTheirPokemon->getPokemons();

        foreach ($pokemonsByTrainer as $key => $pokemon)
        {
            if ($input==$pokemon->getElement())
            {
            	$trainersAndTheirPokemon->addBadges();
                break;
            }
            else
            {
            	$pokemon->reduceHealth();

                if ($pokemon->getHealth()<=0)
                {
                	array_splice($pokemonsByTrainer, $key, 1);

                }
            }
            $trainersAndTheirPokemon->addPokemonToCollection($pokemonsByTrainer);
        }
    }
}

usort($trainersAndTheirPokemons,function($firstTrainer,$secondTrainer){
 return $secondTrainer->getNumberOfBadges() <=> $firstTrainer->getNumberOfBadges();
 });

    foreach($trainersAndTheirPokemons as $result){
        echo $result->getName() . ' ';
        echo $result->getNumberOfBadges() . ' ';
        echo $result-> countPokemons() . PHP_EOL;
    }
?>