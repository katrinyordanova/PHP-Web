<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 1.11.2018 г.
 * Time: 13:05
 */

namespace App\Service;


use App\Data\UserDTO;

interface UserServiceInterface
{
    public function register(UserDTO $userDTO,$confirmPassword):bool;
    public function login(string $username,string $password): ?UserDTO;
    public function currentUser(): ?USerDTO;
    public function edit(UserDTO $userDTO) :bool;

    /**
     * @return \Generator|UserTO[]
     */
    public function all():\Generator;
}