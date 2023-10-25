<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLogin;
use App\Service\UserServiceInterface;

class AuthController extends Controller
{
    private UserServiceInterface $userService;

    public function __construct(UserServiceInterface $UserServiceInterface)
    {
        $this->userService = $UserServiceInterface;
    }

    public function login(AuthLogin $request): object
    {
        return $this->userService->generateToken($request);
    }
}
