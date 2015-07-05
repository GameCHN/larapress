<?php


Route::group(['prefix' => 'app', 'namespace' => 'Modules\App\Http\Controllers'], function()
{
    //App::make(Modules\App\Http\Controllers\AppController::class)->index();

    Route::get('/', 'IndexController@index');
    Route::get('index', 'IndexController@index');
});


