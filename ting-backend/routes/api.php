<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {

    

    Route::post('login', [AuthController::class, 'login']);
    
    //kenapa ada group dalam groud karena,sertiap group/route fungsingy ngak sama

    
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('me', [AuthController::class, 'me']);

        Route::post('logout', [AuthController::class, 'logout']);   //lanjutin routelogout

        //setelah dari hotelcontroller next beikut
        Route::post('hotels', [HotelController::class, 'store']);
        //kenapa hotels? karena mengikuti model hotel ,jdi tambahkan s


        //7-31-26
        //bikin route index buat nampilin daftar hotel
        Route::get('hotels', [HotelController::class, 'index']);
    });
});

//next lanjut,test login postman


//perhatikan baris 16,// dibwaha ini route,msak lu lupa terus route yg mana,kan ada tulisannya Route Buta lu?
    //nah kan katanya login itu public?nah tulis disni bukan diluar prefix,walaupun public bukan artinya di tulis diluar egee