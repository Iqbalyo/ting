<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    //
    public function login(array $validated)
    {
        $user = User::where('email', $validated['email'])->first();

        if (! $user) {
            throw ValidationException::withMessages([
                'email' => ['Email atau password salah']  //kenapa menggunakan array [],karena Laravel tetap menggunakan array agar formatnya konsisten.
            ]);
        }
    }
}