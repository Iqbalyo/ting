<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService; // ini namanya **Dependencies Injection**

//jadi tidak perlu bikin new AuthService(); karena bakalan urus oleh Laravel services container

class AuthController extends Controller
{
    //
    public function __construct(
        private AuthService $authService
    ) {}

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        return $this->authService->login($validated);
    }
}
