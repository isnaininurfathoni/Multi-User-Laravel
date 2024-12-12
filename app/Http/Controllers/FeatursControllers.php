<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeatursControllers extends Controller
{
    
    function index(){
        return view('featurs');
    }
    function administrator(){
        return view('featurs');
    }
    function teknisi(){
        return view('featurs');
    }
    function superuser(){
        return view('featurs');
    }

}
