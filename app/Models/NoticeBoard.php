<?php

namespace App\Models;

use App\Models\NoticeBoardCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoticeBoard extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $dates=[
        'start_time',
        'end_time',
        'start_date',
        'end_date',
    ];



    public function noticeBoardCategory()
    {
        return $this->hasMany(NoticeBoardCategory::class);
    }
}
