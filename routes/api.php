<?php

use CloudCreativity\LaravelJsonApi\Facades\JsonApi;

JsonApi::register('v1')->routes(function ($api){
    $api->resource('tables')->relationships(function ($api){
        $api->hasOne('branches');
    });
    $api->resource('branches')->relationships(function ($api){
        $api->hasMany('tables');
        $api->hasOne('addresses');
    });;

    $api->resource('addresses');
    $api->resource('customers')->relationships(function ($api){
        $api->hasMany('branches');
    });;
});
