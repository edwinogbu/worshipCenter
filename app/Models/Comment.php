<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function users()
    {
        return $this->belongsTo(User::class, 'from_user');
    }

    function blogs(){
        return $this->belongsTo(Blog::class, 'on_blog');
    }
}
