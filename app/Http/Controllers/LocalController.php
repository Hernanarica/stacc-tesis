<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalRequest;
use Illuminate\Http\Request;

class LocalController extends Controller
{
	public function index()
	{
		return view('sections.locals');
	}
	
	public function register(LocalRequest $request)
	{
		//datos para el registro del local
	}
}
