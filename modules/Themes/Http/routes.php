<?php

Route::group(['prefix' => 'themes', 'namespace' => 'Modules\Themes\Http\Controllers'], function()
{
	Route::get('/', 'ThemesController@index');
});