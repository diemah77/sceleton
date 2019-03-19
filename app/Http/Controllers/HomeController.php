<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{   
    public function __invoke()
    {
        return View::component('dashboard');
    }

    public function test()
    {
    	return View::component('test');
    }
}