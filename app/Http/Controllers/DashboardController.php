<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		return view('sections.dashboard');
	}
	
	public function usersView()
	{
		return view('sections.dashboard-users');
	}
	
	public function localsView()
	{
		return view('sections.dashboard-locals');
	}
}
