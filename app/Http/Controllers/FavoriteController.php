<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
	public function store($id)
	{
		$local = Local::find($id);
		$local->addFavorite();
		
		return to_route('home.index');
	}
}
