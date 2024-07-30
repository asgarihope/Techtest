<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface _BaseRepositoryInterface
{

    public function create(array $attributes): Model;


}
