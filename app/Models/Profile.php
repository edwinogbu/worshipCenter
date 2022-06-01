<?php

namespace App\Models;

use App\Models\User;
use App\Models\Testimony;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $dates=[
        'dob',
        'date_joined'
    ];

// public function user()
// {
//     $this->belongsTo(User::class);
// }

public function user()
{
    return $this->belongsTo(User::class, 'id');
}

public function testimony()
{
    return $this->hasMany(Testimony::class);
}

}
