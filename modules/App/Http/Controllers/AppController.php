<?php namespace Modules\App\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

kd('test');

class AppController extends Controller {
	
	public function index()
	{
		return view('app::index');
	}
	
}