<?php

namespace App\Services;

use App\Events\UserLoggedInEvent;
use App\Exceptions\AuthenticateException;
use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 *
 */
class UserService implements UserServiceInterface
{

    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function login(string $username, string $password): bool
    {
        $user = $this->checkUserExist($username);
        throw_if(!$user, AuthenticateException::class, trans('message.auth.successLogin'), 404);
        if (Hash::check($password, $user->password)) {
            Auth::loginUsingId($user->id);
            UserLoggedInEvent::dispatch($user);
            return true;
        } else {
            return false;
        }

    }


    public function checkUserExist(string $mobile): ?User
    {
        return $this->userRepository->exist($mobile);
    }


}
