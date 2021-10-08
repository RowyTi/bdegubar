<?php

use CloudCreativity\LaravelJsonApi\Facades\JsonApi;

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
            $api->hasOne('paymentKey')->except('replace', 'add', 'remove');
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
//            $api->hasOne('staff')->except('replace', 'add', 'remove');
            $api->hasOne('address')->except('replace', 'add', 'remove');
        });

    $api->resource('staff')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('branch')->except('replace', 'add', 'remove');
            $api->hasOne('profile')->except('replace', 'add', 'remove');
        });

    $api->resource('tables')->readOnly()
        ->relationships(function ($api){
            $api->hasOne('branches')->except('replace', 'add', 'remove');
    });










});
