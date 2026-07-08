<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->redirectGuestsTo(function () {
            return null;
        });
    })

    //withMiddleware ITU adalah satpam atau ngasih aturan siapa aja yg boleh akses dan bagian redirectGuestsTo adalah 'kalo ada tamu/user yg belom login,arahkan kemana?biasany ke login tapi itu hanya cocok kalo project kita full blade,krena kita bikin REST API,jangan kemana2 dulu,cukup kasih respon 401 dlu,karena rest api harus pakek http status code 401

    //fundemental code
    //withMiddleware() adalah fitur request buat nambah aturan ke apilkasi
    //redirectGuesto adalah method untuk ngatur redirect ke tamu


    //
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*'),
        );
    })->create();
