<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function me(Request $request) 
    {
        $user = $request->user();
        return [
            'user' => $user,
        ];
    }

    public function logout(Request $request)
    {
        return $this->authService->logout($request->user());
    }
}

//penjelasan dan flow ny liat baris 24 itu artinya ambil user yg udh disiapkan sanctum
