<?php

namespace App\Models;

use App\Models\Income;
use App\Models\Expense;
use App\Models\Profile;
use App\Models\CashBook;
use App\Models\Testimony;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserManagement extends Model
{
    use HasFactory;

    protected $fillable = [
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


    public function profile()
    {
        return $this->hasOne(Profile::class);
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

}
