<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $guarded =[];
    // protected $table = "audio";

    // protected $fillable = [
    //     'song_title', 'song_name','song_unique_name',
    //     'song_size','song_extension','album_name','album_year','artist_name','song_thumbnail'
    // ];
}
