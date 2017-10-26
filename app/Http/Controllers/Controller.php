<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
//        if(Route::currentRouteName() !== 'login' && Route::currentRouteName() !== '/') {
//            $this->middleware('auth');
//        }
    }

    public function _pr($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
}
