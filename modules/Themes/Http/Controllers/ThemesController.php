<?php namespace Modules\Themes\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ThemesController extends Controller {
	
	public function index()
	{
		return view('themes::index');
	}
	
}