<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function index()
	{
		return view('sections.register');
	}
	
	public function store(UserRequest $request)
	{
		User::create([
			'role_id'  => $request->role_id,
			'name'     => $request->name,
			'lastname' => $request->lastname,
			'email'    => $request->email,
			'password' => Hash::make($request->password)
		]);
		
		return to_route('home.index')->with('success', 'Usuario registrado con exito');
	}
}
