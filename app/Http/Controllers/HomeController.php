<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('dashboard.index');
    }
    public function tentangAplikasi()
    {
        return view('dashboard.tentang');
    }
    public function contactUs()
    {
        return view('dashboard.contact');
    }
}
