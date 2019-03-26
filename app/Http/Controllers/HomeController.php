<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{   
    public function __invoke()
    {
        return render('dashboard');
    }

    public function test()
    {
    	return render('test');
    }
}