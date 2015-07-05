<?php namespace App\Main\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class MainController extends Controller {
	
	public function index()
	{
        global $wpdb, $current_site;
        define('WP_ONLY',true);
        require_once dirname(base_path()).'/app/article/index.php';
		return view('main::index');
	}
	
}