<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $guarded=[];

    public const IS_ACTIVE_SELECT=[
        1=>'published',
        0=>'pending'
    ];
//    protected $fillable=[
//        'title',
//        'name',
//        'description',
//        'picture',
//        'category_id'
//    ];

   public function category()
   {
       return $this->belongsTo(Category::class);
   }

   public function comments()
   {
        return $this->hasMany(Comment::class, 'on_blog');
   }
   public function users()
   {

        return $this->belongsTo(User::class, 'user_id');
   }



}
