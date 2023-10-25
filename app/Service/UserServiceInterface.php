<?php

namespace App\Service;

use App\Http\Requests\AuthLogin;

interface UserServiceInterface
{
    public function generateToken(AuthLogin $request): object;
}
