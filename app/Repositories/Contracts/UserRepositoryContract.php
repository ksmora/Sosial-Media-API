<?php

namespace App\Repositories\Contracts;

interface UserRepositoryContract
{
    public function registerUser(array $data);

    public function getMyProfile();

    public  function findByEmail(array $data);

    public function findById($userId);

    public function searchByName($name);

}
