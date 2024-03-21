<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('correo', 'password');
        if (Auth::attempt($credentials)) {
            switch (Auth::user()->estado_activacion) {
                case 'S':
                    return redirect()->intended('/home');
                    break;
                case 'B':
                    Session::flush();
                    Auth::logout();
                    return redirect()->back()->withInput()->with('error', 'El usuario esta bloqueado por administrador');
                default:
                    Session::flush();
                    Auth::logout();
                    return redirect()->back()->withInput()->with('error', 'Lo sentimos, no sabemos porqué estas bloqueado');
                    break;
            }
        }
        return redirect()->back()->withInput()->with('error', 'Correo o contraseña incorrecta');
    }
}
