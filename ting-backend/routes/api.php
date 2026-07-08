<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {

    

    Route::post('login', [AuthController::class, 'login']);
    
    //kenapa ada group dalam groud karena,sertiap group/route fungsingy ngak sama

    
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('me', [AuthController::class, 'me']);

        Route::post('logout', [AuthController::class, 'logout']);   //lanjutin routelogout
    });
});


//perhatikan baris 16,// dibwaha ini route,msak lu lupa terus route yg mana,kan ada tulisannya Route Buta lu?
    //nah kan katanya login itu public?nah tulis disni bukan diluar prefix,walaupun public bukan artinya di tulis diluar egee