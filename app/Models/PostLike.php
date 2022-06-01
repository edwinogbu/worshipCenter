<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostLike extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
