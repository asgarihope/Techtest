<?php

namespace App\Services;

use App\Events\UserLoggedInEvent;
use App\Exceptions\AuthenticateException;
use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\FibonacciServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 *
 */
class FibonacciService implements FibonacciServiceInterface
{


    public function compute(int $n): int|float
    {
        if ($n < 0) {
            throw new \InvalidArgumentException(trans('message.invalidFibonacciNumber'));
        }

        if ($n === 0) {
            return 0;
        }

        if ($n === 1) {
            return 1;
        }

        $previous = 0;
        $current = 1;

        for ($i = 2; $i <= $n; $i++) {
            $next = $previous + $current;
            $previous = $current;
            $current = $next;
        }

        return $current;
    }
}
