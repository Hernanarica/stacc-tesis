<?php

namespace App\Http\Controllers;

use App\Models\Local;
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
		return view('sections.dashboard-locals', [
			'locals' => $locals
		]);
	}
}
