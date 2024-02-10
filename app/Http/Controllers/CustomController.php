<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.registerauthmiddleware');
    }

    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'admin') {
            // Credenciais válidas, redirecionar para a rota desejada (por exemplo, '/register')
            return redirect('/register')->with('custom_value','d.(LBc91QTPx~|%.C£*Z]>]&E>I?vN2=x^aR]U{cX8g2sxzJH<');
        } else {
            // Credenciais inválidas, redirecionar de volta para a view com uma mensagem de erro
            return redirect('/authmiddle')->with('error', 'Credenciais inválidas');
        }
    }
}
