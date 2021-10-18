<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\StaffController;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

JsonApi::register('v1')->routes(function ($api, $router){
    $api->resource('addresses')->readOnly();

    $api->resource('branches')->readOnly()
        ->relationships(function ($api){
            $api->hasMany('products')->except('replace', 'add', 'remove');
            $api->hasMany('tables')->except('replace', 'add', 'remove');
            $api->hasMany('categories')->except('replace', 'add', 'remove');
            $api->hasMany('comments')->except('replace', 'add', 'remove');
            $api->hasMany('staff')->except('replace', 'add', 'remove');
            $api->hasOne('addresses')->except('replace', 'add', 'remove');
        });

    $api->resource('categories')->readOnly()
        ->relationships(function ($api){
            $api->hasMany('branches')->except('replace', 'add', 'remove');
        });

    $api->resource('comments')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('branch')->except('replace', 'add', 'remove');
            $api->hasOne('user')->except('replace', 'add', 'remove');
        });

    $api->resource('customers')->readOnly()
        ->relationships(function ($api){
            $api->hasMany('branches')->except('replace', 'add', 'remove');
            $api->hasOne('paymentkeys')->except('replace', 'add', 'remove');
        });

    $api->resource('paymentkeys')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('customer')->except('replace', 'add', 'remove');
        });

    $api->resource('products')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('branches')->except('replace', 'add', 'remove');
        });

    $api->resource('profiles')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('address')->except('replace', 'add', 'remove');
        });

    $api->resource('socialnetworks')->readOnly();
//        ->relationships(function ($api){
//            $api->hasOne('branch')->except('replace', 'add', 'remove');
//            $api->hasOne('profile')->except('replace', 'add', 'remove');
//        });

    $api->resource('staff')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('branch')->except('replace', 'add', 'remove');
            $api->hasOne('profile')->except('replace', 'add', 'remove');
        });

    $api->resource('tables')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('branches')->except('replace', 'add', 'remove');
    });

    $api->resource('users')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('profile')->except('replace', 'add', 'remove');
            $api->hasMany('socialnetworks')->except('replace', 'add', 'remove');
            $api->hasMany('comments')->except('replace', 'add', 'remove');
        });

    // Login para miembros del staff [Clientes y Empleados]
    Route::post('login/staff', [LoginController::class, 'loginStaff']);
    Route::post('logout', [LoginController::class, 'logout'])
        ->middleware('auth:sanctum');

    // Login & Register para usuarios form


    // Login para usuarios finales con redes sociales [facebook, google]
    Route::post('login/mobile', [LoginController::class, 'loginMobile']);

//    Route::get('login/{socialNetwork}', [LoginController::class, 'redirectToDriver'])
//        ->middleware('social_network');
//    Route::get('login/{socialNetwork}/callback', [LoginController::class, 'handleDriverCallback']);

    // Usuario autenticado
    Route::get('me', StaffController::class)
        ->middleware('auth:sanctum')
        ->name('me');
});
