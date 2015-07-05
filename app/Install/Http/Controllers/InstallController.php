<?php namespace App\Install\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class InstallController extends Controller {
	
	public function index()
	{
		return view('install::index');
	}
	
}