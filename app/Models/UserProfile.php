<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    protected $guarded=[];



   /**
    * Get the user that owns the UserProfile
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */


    /**
        * Get the user that owns the UserProfile
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */
       public function user(): BelongsTo
       {
           return $this->belongsTo(User::class, 'id', 'user_id');
       }

}
