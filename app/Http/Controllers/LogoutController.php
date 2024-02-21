<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index()
    {
        Auth::logout();

        return to_route('login.index')->with('success', 'Logout realizado com exito, te esperamos pronto');
    }
}
