<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AuthenticateException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//	protected $redirectTo = RouteServiceProvider::HOME;
    private UserServiceInterface $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserServiceInterface $userService
    )
    {
        $this->userService = $userService;
    }

    public function attemptLogin(LoginRequest $request)
    {
        try {
            if ($this->userService->login($request->get('email'), $request->get('password'))) {
                return redirect(route('panel.index'))->with(['success' => trans('message.auth.successLogin')]);
            }
            return redirect(route('login'))->with(['error' => trans('message.auth.failedLogin')]);
        } catch (AuthenticateException  $throwable) {
            return redirect(route('login'))->with(['error' => trans('message.auth.failedLogin')]);
        }
    }

    public function logout(\Illuminate\Http\Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login')->with(['info' => trans('message.auth.loggedOut')]);
    }

}
