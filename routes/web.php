<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

Route::get('/', function () use ($router) {
    return $router->app->version();
});

Route::group([
    'namespace' => 'Api\V1',
], function() {
    Route::post('register', 'DeviceController@registerDevice');
    Route::group([
        'prefix' => 'absen'
    ], function() {
        Route::get('tapIn', 'AbsenApiController@tapIn');
    });
});
