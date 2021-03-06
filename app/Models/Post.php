<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\PostUserComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // protected $fillable =[
    //     'body'
    // ];

    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);

    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }



    public function commentBy(User $user)
    {
        return $this->comments->contains('user_id', $user->id);

    }


    public function comments()
    {
        return $this->hasMany(PostUserComment::class, 'post_id');
    }




        // public function comments()
        // {
        //      return $this->hasMany(PostUserComment::class, 'post_id');
        // }
    // public function comments()
    // {

    //      return $this->belongsTo(User::class, 'user_id');
    // }


    // public function users()
    // {

    //      return $this->belongsTo(User::class, 'user_id');
    // }




}
