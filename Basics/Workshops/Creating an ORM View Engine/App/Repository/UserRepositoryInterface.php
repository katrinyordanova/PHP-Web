<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 31.10.2018 г.
 * Time: 18:24
 */

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO) : bool;
    public function findOneByUsername(string $username): ?UserDTO;
    public function findOneById(int $id): ?UserDTO;
    public function update(int $id,UserDTO $userDTO) :bool;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator;
}