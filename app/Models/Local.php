<?php

namespace App\Models;

use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
	use HasFactory, Favoriteable;
	
	protected $fillable = [
		'user_id',
		'neighborhood_id',
		'name',
		'address',
		'opening_time',
		'closing_time',
		'url_site',
		'url_map',
		'phone',
		'terms',
		'address',
		'image',
		'image_alt',
	];
	
}