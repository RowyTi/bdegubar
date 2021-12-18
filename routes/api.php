<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\UserController;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
use Illuminate\Support\Facades\Route;

JsonApi::register('v1')->withNamespace('Api')->routes(function ($api, $router){
    $api->resource('addresses')->except('index');

    $api->resource('branches')
        ->relationships(function ($api){
            $api->hasMany('products')->except('replace', 'add', 'remove');
            $api->hasMany('tables')->except('replace', 'add', 'remove');
            $api->hasMany('categories')->except('add', 'remove');
            $api->hasMany('comments')->except('replace', 'add', 'remove');
            $api->hasMany('orders')->except('replace', 'add', 'remove');
            $api->hasMany('staff')->except('replace', 'add', 'remove');
            $api->hasOne('addresses')->except('replace', 'add', 'remove');
            $api->hasOne('paymentkey')->except('replace', 'add', 'remove');
        });

    $api->resource('categories')
        ->relationships(function ($api){
            $api->hasMany('branches')->except('replace', 'add', 'remove');
        });

    $api->resource('comments')
        ->relationships(function ($api){
            $api->hasOne('branch')->except('replace', 'add', 'remove');
            $api->hasOne('user')->except('replace', 'add', 'remove');
        });

    $api->resource('paymentkeys');
//        ->readOnly()
//        ->relationships(function ($api){
//            $api->hasOne('branch')->except('replace', 'add', 'remove');
//        });

    $api->resource('products')
        ->relationships(function ($api){
            $api->hasOne('branches')->except('replace', 'add', 'remove');
        });

    $api->resource('profiles')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('address')->except('replace', 'add', 'remove');
        });

    $api->resource('socialnetworks')->readOnly()
        ->relationships(function ($api){
            $api->hasMany('users')->except('replace', 'add', 'remove');
        });

    $api->resource('staff')
        ->relationships(function ($api){
            $api->hasOne('branches')->except('replace', 'add', 'remove');
            $api->hasOne('profile')->except('replace', 'add', 'remove');
        });

    $api->resource('tables')
        ->relationships(function ($api){
            $api->hasOne('branch')->except('replace', 'add', 'remove');
        });

    $api->resource('users')
        ->relationships(function ($api){
            $api->hasOne('profile')->except('replace', 'add', 'remove');
            $api->hasMany('socialnetworks')->except('replace', 'add', 'remove');
            $api->hasMany('comments')->except('replace', 'add', 'remove');
        });

    $api->resource('orders');

    $api->patch('tables/state/{table}', 'StateController@tableState')
         ->middleware('auth:sanctum')
         ->name('change.state.table');
    $api->get('role', 'PermissionController@getRole')
        ->middleware('auth:sanctum')
        ->name('all.role');

    // VALIDATION UNIQUE STATE
    $api->get('user-validate/{user}', 'UniquesController@usersUnique')
        ->middleware('auth:sanctum')
        ->name('user.unique.validate');
    $api->get('staff-validate/{staff}', 'UniquesController@staffUnique')
        ->middleware('auth:sanctum')
        ->name('staff.unique.validate');
    $api->get('branch-validate/{branch}', 'UniquesController@branchUnique')
        ->middleware('auth:sanctum')
        ->name('branch.unique.validate');
    $api->get('category-validate/{category}', 'UniquesController@categoriesUnique')
        ->middleware('auth:sanctum')
        ->name('category.unique.validate');
    $api->get('table-validate/{table}', 'UniquesController@tableUnique')
        ->middleware('auth:sanctum')
        ->name('table.unique.validate');



    // Login para miembros del staff [Clientes y Empleados]
    Route::post('login/staff', [LoginController::class, 'loginStaff'])->name('login.staff');
    Route::get('refresh/staff', [LoginController::class, 'refresh'])->name('refresh.token.staff')
        ->middleware('auth:sanctum');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout')
        ->middleware('auth:sanctum');

    // Login & Register para usuarios form
    Route::post('login/mobile', [LoginController::class, 'loginMobile'])->name('login.user.mobile');
    Route::post('register/mobile', [RegisterController::class, 'register'])->name('register.user.staff');
    // Login para usuarios finales con redes sociales [facebook, google]
    Route::post('login/social', [LoginController::class, 'loginMobileSocial'])->name('login.user.social');
    // Usuario autenticado
    Route::get('user',[ UserController::class, 'getAuthUser'])
        ->middleware('auth:sanctum')
        ->name('user.auth');
});
