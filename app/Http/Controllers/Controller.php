<?php

namespace App\Http\Controllers;

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
		$theme = Theme::where('active', '=', 1)->first();
		$path = 'user/'.$theme->root_folder . '/';
		
		$this->path = $path;
		View::share('path', $path);
	}
}
