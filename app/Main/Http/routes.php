<?php

Route::group(['prefix' => '', 'namespace' => 'App\Main\Http\Controllers'], function()
{
	Route::get('/', 'MainController@index');
    Route::any('{all?}', 'MainController@index')->where('all', '.+');

});