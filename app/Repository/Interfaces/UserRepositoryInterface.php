<?php

namespace App\Repository\Interfaces;

use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface extends _BaseRepositoryInterface
{
    public function exist(string $mobile): ?User;

}
