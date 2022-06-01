<?php

namespace App\Models;

use App\Models\PropheticDeclaration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeclarationCategory extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function propheticDeclaration()
    {
        return $this->hasMany(PropheticDeclaration::class);
    }
}
