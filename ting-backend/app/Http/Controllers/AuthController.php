<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService; // ini namanya **Dependencies Injection**

//jadi tidak perlu bikin new AuthService(); karena

class AuthController extends Controller
{
    //
    public function __construct(private AuthService $authServices
    )
    {
       
    }
}
