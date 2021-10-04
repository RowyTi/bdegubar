<?php

use CloudCreativity\LaravelJsonApi\Facades\JsonApi;

JsonApi::register('v1')->routes(function ($api){
    $api->resource('addresses')->only('index', 'read');

    $api->resource('branches')->only('index', 'read')
        ->relationships(function ($api){
            $api->hasMany('products')->except('replace', 'add', 'remove');
            $api->hasMany('tables')->except('replace', 'add', 'remove');
            $api->hasMany('categories')->except('replace', 'add', 'remove');
            $api->hasOne('addresses')->except('replace', 'add', 'remove');
    });

    $api->resource('categories')->only('index', 'read')
        ->relationships(function ($api){
            $api->hasMany('branches')->except('replace', 'add', 'remove');
    });

    $api->resource('customers')->only('index', 'read')
        ->relationships(function ($api){
            $api->hasMany('branches')->except('replace', 'add', 'remove');
    });

    $api->resource('paymentkeys')->only('index', 'read')
        ->relationships(function ($api){
            $api->hasOne('customer')->except('replace', 'add', 'remove');
        });

    $api->resource('products')->only('index', 'read')
        ->relationships(function ($api){
            $api->hasOne('branches')->except('replace', 'add', 'remove');
    });

    $api->resource('tables')->only('index', 'read')
        ->relationships(function ($api){
            $api->hasOne('branches')->except('replace', 'add', 'remove');
    });










});
