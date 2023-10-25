<?php

namespace App\Service;

use App\Http\Requests\AuthLogin;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Justfeel\Response\ResponseCodes;
use Justfeel\Response\ResponseResult;

class UserService implements UserServiceInterface
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
    }

    private function _getLoggedUser(): ?Authenticatable
    {
        return Auth::user() ?? null;
    }

    public function generateToken(AuthLogin $request): object
    {
        if ($request->validator->fails()) {
            return ResponseResult::generate(false, $request->validator->messages(), ResponseCodes::HTTP_BAD_REQUEST);
        }

        try {
            if (Auth::attempt($request->except('error_list'))) {
                $token = $this->userRepository->generateToken($this->_getLoggedUser());

                return response()->json([
                    'success' => true,
                    'data' => [
                        'user' => Auth::user(),
                        'token' => $token
                    ],
                ],ResponseCodes::HTTP_OK);
            }

            return ResponseResult::generate(false, ["User not found"], ResponseCodes::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return ResponseResult::generate(false, $exception->getMessage(), ResponseCodes::HTTP_BAD_REQUEST);
        }
    }
}
