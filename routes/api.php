<?php

use App\Http\Controllers\Api\Auth\LoginController;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

JsonApi::register('v1')->routes(function ($api){
    $api->resource('addresses')->readOnly();

    $api->resource('branches')->readOnly()
        ->relationships(function ($api){
            $api->hasMany('products')->except('replace', 'add', 'remove');
            $api->hasMany('tables')->except('replace', 'add', 'remove');
            $api->hasMany('categories')->except('replace', 'add', 'remove');
            $api->hasMany('staff')->except('replace', 'add', 'remove');
            $api->hasOne('addresses')->except('replace', 'add', 'remove');
        });

    $api->resource('categories')->readOnly()
        ->relationships(function ($api){
            $api->hasMany('branches')->except('replace', 'add', 'remove');
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
        });

    //Login para miembros del staff [Clientes y Empleados]
    Route::post('login', [LoginController::class, 'loginStaff'])->middleware('guest:sanctum');
    Route::post('logout', [LoginController::class, 'logoutStaff'])->middleware('auth:sanctum');
    Route::middleware('auth:sanctum')->get('/me', function (Request $request) {
        if(Auth::check()){
            return Auth::user();
        }
        return $request->staff();
    });

    //Login para usuarios finales con redes sociales [facebook, google]
    Route::get('login/{driver}', [LoginController::class, 'redirectToDriver'])->middleware('guest:sanctum');
    Route::get('login/{driver}/callback', [LoginController::class, 'handleDriverCallback']);

});
