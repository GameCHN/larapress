<?php

Route::group(['prefix' => 'install', 'namespace' => 'App\Install\Http\Controllers'], function()
{
	Route::get('/', 'InstallController@index');
});