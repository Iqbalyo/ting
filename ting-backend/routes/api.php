<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {

    Route::post('login', [AuthController::class, 'login']);

    // kenapa ada group dalam groud karena,sertiap group/route fungsingy ngak sama

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', [AuthController::class, 'me']);

        Route::post('logout', [AuthController::class, 'logout']);   // lanjutin routelogout

        // setelah dari hotelcontroller next beikut
        Route::post('hotels', [HotelController::class, 'store']);
        // kenapa hotels? karena mengikuti model hotel ,jdi tambahkan s

        // 7-31-26
        // bikin route index buat nampilin daftar hotel
        Route::get('hotels', [HotelController::class, 'index']);

        // next kesiin setelah dari flowpembuatan 8/4/26 dan hotelservice
        Route::get('hotels/{hotel}', [HotelController::class, 'show']);

        // next update hotel
        Route::put('hotels/{hotel}', [HotelController::class, 'update']);
        // next lanjut test update di postmen

        // berikut prose/flow update
        // 1. Route::put('hotels/{hotel}', [Hotelcontroller::class, 'update']);
        // gw mau bkin route baru,yakni put buat update/memperbarui data,dimana target lokasinya di'hotels/{hotel}' yg nanti diikutin oleh id hotel masing2,kemudian datany diolah dan dieksekusi oleh fungsi update di Hotelcontroller
        // jika sudah bkin form request UpdatehotelRequest dg php artisan make
        // step ke 2 pergi ke file updatehotelrequest yg udh di bikin sebelumnya,
        // dan ubah authorize false,menjadi true karena,artinya user boleh update,
        // kemudian masuk ke rules, copy dari storehotel,tinggal ubah,required menjadi,sometimes,yg artinya data boleh diubah atau boleh tidak diubah,dmna nanti akan tetap berhasil,
        // step 3 ke hotelcontroller,buat method update, waktu pembuatan flow ini 8/11/26 2.34

        // 8-13-26 2:36
        // fitur crud terakhir delete
        Route::delete('hotels/{hotel}', [HotelController::class, 'destroy']);
        // next pergi ke HotelController

        // 8-14-26 10:47
        // fitur crud selesai

    });
});

// next lanjut,test login postman

// perhatikan baris 16,// dibwaha ini route,msak lu lupa terus route yg mana,kan ada tulisannya Route Buta lu?
// nah kan katanya login itu public?nah tulis disni bukan diluar prefix,walaupun public bukan artinya di tulis diluar egee

// Route Model Binding
// Jadi Route Model Binding membantu mencari data, tapi tidak otomatis memeriksa hak akses.
