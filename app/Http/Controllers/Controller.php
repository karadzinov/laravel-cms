<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Theme;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public $path;

	public function __construct()
	{
		try {
			$theme = Theme::where('active', '=', 1)->first();
			$path = 'user/'.$theme->root_folder . '/';
		} catch (Exception $e) {
			$path = 'user/theme-1/';
		}
		
		$this->path = $path;
		View::share('path', $path);
	}
}
