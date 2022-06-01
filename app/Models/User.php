<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Post;
use App\Models\Income;
use App\Models\Expense;
use App\Models\Profile;
use App\Models\CashBook;
use App\Models\Testimony;
use App\Models\Appointment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'membership_id',
        'first_name',
        'sur_name',
        'email',
        'phone',
        'role_name',
        'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



        /**
         * Get the user associated with the User
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasOne
         */
        public function profile(): HasOne
        {
            return $this->hasOne(Profile::class, 'user_id');
        }



    public function testimony()
    {
        return $this->hasMany(Testimony::class);
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
    public function income()
    {
        return $this->hasMany(Income::class);
    }
    public function expense()
    {
        return $this->hasMany(Expense::class);
    }

    public function cashbook()
    {
        return $this->hasOne(CashBook::class);
    }


    // forum post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function receivedLikes()
    {
        return $this->hasManyThrough(Like::class, Post::class);
    }

}
