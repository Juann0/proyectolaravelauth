<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function index()
    {
        return view('auth.registro');
    }

    public function registroDeUsuarios(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required',
            'password' => 'required'
        ]);
        $data = $request->all();
        $this->create($data);
        return redirect()->back()->withInput()->with('correcto', 'Usuario registrado correctamente');
    }

    public function create(array $data)
    {
        Usuarios::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
            'estado_activacion' => 'S',
            'rol' => 'A'
        ]);
    }
}
