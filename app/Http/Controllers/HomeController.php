<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.home');

        // if (Auth::check() && auth()->user()->rol == 'A') {
        //     return view('app.home');
        // }
        // return redirect('/');
    }
}
