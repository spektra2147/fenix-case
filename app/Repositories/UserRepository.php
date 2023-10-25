<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Authenticatable;

class UserRepository implements UserRepositoryInterface
{
    public function generateToken(Authenticatable $auth): string
    {
        return $auth->createToken('myApp')->plainTextToken;
    }

    public function deleteToken(Authenticatable $auth): bool
    {
        return $auth->tokens()->delete();
    }
}
