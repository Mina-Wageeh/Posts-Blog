<?php

namespace App;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable =
    [
        'name', 'email', 'password',
    ];

    protected $hidden =
    [
        'password', 'remember_token',
    ];

    protected $casts =
    [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this -> hasMany(Post::class , 'user_id' , 'id');
    }

    public function comments()
    {
        return $this -> hasMany(Comment::class , 'user_id' , 'id');
    }
}
