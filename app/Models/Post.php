<?php

namespace App\Models;

use App\User;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable =
        [
            'user_id' ,
            'description' ,
            'post_images_count' ,
            'likes_count' ,
            'dislikes_count' ,
            'comments_count'
        ];
    public $timestamps =true;

    public function user()
    {
        return $this -> belongsTo(User::class , 'user_id' , 'id');
    }

    public function images()
    {
        return $this -> hasMany(Image::class , 'post_id' , 'id');
    }

    public function comments()
    {
        return $this -> hasMany(Comment::class , 'post_id' , 'id');
    }
}
