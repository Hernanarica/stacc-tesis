<?php

namespace App\Models;

use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Favoriteability, HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'image',
        'email',
        'category',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * > The `locals()` function returns all the `Local`s that belong to the `User`
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany collection of Local objects.
     */
    public function locals()
    {
        return $this->hasMany(Local::class);
    }

    /**
     * The posts() function returns all the posts that belong to the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany collection of Post objects.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
