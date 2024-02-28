<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('sections.register');
    }

    public function store(RegisterStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::uuid().'.'.$image->getClientOriginalExtension();
            $image->storeAs('/profile', $imageName, 'public-images');
        }

        User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'image' => $imageName ?? null,
            'password' => Hash::make($request->password),
        ]);

        return to_route('home.index')->with('success', 'Registro exitoso');
    }
}
