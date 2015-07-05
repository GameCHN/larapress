<?php namespace Modules\App\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class IndexController extends Controller {
	
	public function index()
	{
		return view('app::index');
	}
	
}