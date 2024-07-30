<?php

namespace App\Services\Interfaces;

interface FibonacciServiceInterface
{
    public function compute(int $n): int|float;
}
