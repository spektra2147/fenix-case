<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Authenticatable;

interface UserRepositoryInterface
{
    public function generateToken(Authenticatable $auth): string;

    public function deleteToken(Authenticatable $auth): bool;
}
