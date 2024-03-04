<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('sections.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return to_route('home.index')->with('success', 'Login realizado con éxito');
        }

        return redirect()->back()->withInput()->with([
            'error' => 'Credenciales incorrectas',
        ]);
    }
}
