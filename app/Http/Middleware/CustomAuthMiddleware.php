<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verificar se o usuário está tentando acessar a rota '/register'
        if ($request->is('register') && !$request->isMethod('POST')) {
            $customValue = $request->session()->get('custom_value');
            if($customValue == 'd.(LBc91QTPx~|%.C£*Z]>]&E>I?vN2=x^aR]U{cX8g2sxzJH<') {
                return $next($request);
            }
            return redirect('/authmiddle'); // Redirecionar para a página com o formulário de login
        }

        return $next($request);
    }

    protected function authenticated($request)
    {
        // Implemente sua lógica de autenticação aqui
        // Por simplicidade, vamos assumir que as credenciais estão codificadas
        $username = 'admin';
        $password = 'admin';

        return $request->input('username') === $username && $request->input('password') === $password;
    }
}