<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Neighborhoods;
use Illuminate\Http\Request;

class StoresOwnController extends Controller
{
    //
	public function index()
	{
		//obtener el id del usuario logueado y mandarle a la vista sus locales
		
//		$locals = Local::where('id', auth()->user()->id)->get();
		$locals = Local::with('neighborhood')
			->where('user_id', auth()->user()->id)->get();
		return view('sections.stores', [
			'locals' => $locals,
		]);
	}
}
