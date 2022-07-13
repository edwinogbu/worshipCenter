<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostUserComment extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'post_id',
        'body'
    ];


    protected $guarded=[];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // public function posts()
    // {
    //     return $this->hasMany(Post::class, 'post_id');
    // }


}
