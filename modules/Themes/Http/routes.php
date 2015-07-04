<?php

Route::group(['prefix' => 'themes', 'namespace' => 'Modules\Themes\Http\Controllers'], function()
{
	Route::any('/', 'ThemesController@index');
});