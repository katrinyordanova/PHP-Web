<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 31.10.2018 г.
 * Time: 18:40
 */

use App\Data;
class UserDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    private $bornOn;

    public static function create($userName,$password,$firstName,$lastName,$bornOn,$id=null){
        return (new UserDTO())
            ->setUsername($userName)
            ->setPassword($password)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setBornOn($bornOn)
            ->setId($id);
    }

    //Getters
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBornOn()
    {
        return $this->bornOn;
    }
    //Setters

    public function setId(int $id): UserDTO
    {
        $this->id = $id;
        return $this;
    }
    
    public function setUsername(string $username): UserDTO
    {
        $this->username = $username;
        return $this;
    }

    public function setPassword(string $password): UserDTO
    {
        $this->password = $password;
        return $this;
    }

    public function setFirstName(string $firstName): UserDTO
    {
        $this->firstName = $firstName;
        return $this;
    }
    
     function setLastName(string $lastName): UserDTO
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setBornOn($bornOn): UserDTO
    {
        $this->bornOn = $bornOn;
        return $this;
    }
}