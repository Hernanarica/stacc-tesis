<?php

namespace App\Models;

use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Local extends Model
{
    use Favoriteable, HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'street',
        'street-number',
        'phone',
        'neighborhood_id',
        'map',
        'website',
        'description',
        'cover-photo',
        'certificate',
        'social-networks',
        'schedules',
        'terms',
    ];

    protected $casts = [
        'social-networks' => 'array',
        'schedules' => 'array',
    ];

    public function neighborhood(): HasOne
    {
        return $this->hasOne(Neighborhoods::class, 'id', 'neighborhood_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
