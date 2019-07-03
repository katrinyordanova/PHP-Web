<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 1.11.2018 г.
 * Time: 13:09
 */

namespace App\Service;


use App\Data\UserDTO;

class UserService implements UserServiceInterface
{
    /**
     * @var UserServiceInterface
     */
    private $userRepository;

    public function __construct(UserServiceInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(UserDTO $userDTO, $confirmPassword): bool
    {
        //checks if both of the passwords are the same
        if ($userDTO->getPassword()!=$confirmPassword){
            return false;
        }

        //checks if the username already exists
        if ($this->userRepository->findOneByUsernam($userDTO->getUsername() !== null)){
            return false;
        }

        //if everything is fine get,hash and return hashed password
        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);
    }


    public function login(string $username, string $password): ?UserDTO
    {
        //check if this user exists
        $currentUser=$this->userRepository->findOneByUsername($username);
        if ($currentUser===null){
            return null;
        }

        //check if the password is the same
        $userPasswordHash=$currentUser->getPassword();
        if (false===password_verify($password,$userPasswordHash)){
            return null;
        }
        return $currentUser;
    }

    public function currentUser(): ?USerDTO
    {
        if (!isset($_SESSION['id'])){
            return null;
        }
        return $this->userRepository->findOneById($_SESSION['id']);
    }

    public function edit(UserDTO $userDTO): bool
    {
        $currentUser=$this->userRepository->findOneByUsername($userDTO->getUsername());
        if ($currentUser===null){
            return false;
        }


        $this->encryptPassword($userDTO);
        return $this->userRepository->update($_SESSION['id'],$userDTO);
    }

    /**
     * @param UserDTO $userDTO
     */
    public function encryptPassword(UserDTO $userDTO): void
    {
        $plainText = $userDTO->getPassword();
        $passwordHash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPAssword($passwordHash);
    }

    public function all(): \Generator
    {
        $this->userRepository->findAll();
    }
}