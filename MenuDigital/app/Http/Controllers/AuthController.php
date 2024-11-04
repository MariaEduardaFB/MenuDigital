<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Notifications\EmpresaRegistrada;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    
    public function showRegisterForm()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:empresa,email',
            'senha' => 'required|min:6|confirmed',
            'telefone' => 'required|string|max:15',
            'cnpj' => 'required|string|max:18',
            'endereco' => 'required|string|max:255',
        ]);

        
        $empresa = Empresa::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'telefone' => $request->telefone,
            'cnpj' => $request->cnpj,
            'endereco' => $request->endereco,
        ]);

        
        Notification::send($empresa, new EmpresaRegistrada());

    
        Auth::login($empresa);

        return redirect()->intended('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
