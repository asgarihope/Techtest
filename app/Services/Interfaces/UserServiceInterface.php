<?php namespace App\Services\Interfaces;

use App\Models\User;

interface UserServiceInterface
{

    public function login(string $username, string $password): bool;

    public function checkUserExist(string $mobile): ?User;

}
