<?php

namespace App\Models;

use App\Models\NoticeBoard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoticeBoardCategory extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function noticeBoard()
    {
        return $this->hasMany(NoticeBoard::class);
    }
}
