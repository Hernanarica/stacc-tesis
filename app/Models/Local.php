<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
	use HasFactory;
	
	//protected $fillable = ['title', 'comment', 'is_active', 'user_id'];
	public $fillable = [
		'name',
		'address',
		'opening_time',
		'closing_time',
		'url_site',
		'url_time',
		'phone',
		'terms',
		'address',
		'image',
	];
}
