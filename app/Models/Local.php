<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
	use HasFactory;
	
	protected $fillable = [
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
