<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        return view('site.home');
    }

    public function redirectHome()
    {
        return redirect() -> route('home.page');
    }
}
