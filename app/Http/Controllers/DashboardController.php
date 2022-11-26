<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Neighborhoods;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		return view('sections.dashboard');
	}
	
	public function usersView()
	{
		//mandar a la vista de usuarios todos los usuarios
		$users = User::all();
		return view('sections.dashboard-users', [
			'users' => $users
		]);
	}
	
	public function localsView()
	{
		//manda a la vista de locales todos los locales
		$locals = Local::all();
		return view('sections.dashboard-local-edit', [
			'locals' => $locals
		]);
	}
	
	/**
	 * It changes the status of a local.
	 *
	 * @param local $local The name of the route parameter.
	 */
	public function changeStatus($local){
		$local = Local::find($local);
		if($local->is_public == 1){
			$local->is_public = 0;
		}else{
			$local->is_public = 1;
		}
		$local->save();
		return redirect()->route('dashboard.locals.view')->with('success', 'Local actualizado correctamente');
	}
	
	/**
	 * It returns a view with the local object
	 *
	 * @param id $id The id of the local you want to edit.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View view 'sections.dashboard-local-edit' is being returned.
	 */
	public function localEdit($id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
	{
		$local = Local::with('neighborhood')->find($id);
		$neighborhoods = Neighborhoods::all();
		return view('sections.dashboard-local-edit', [
			'local' => $local,
			'neighborhoods' => $neighborhoods
		]);
	}
}
