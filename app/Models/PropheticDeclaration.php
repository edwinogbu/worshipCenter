<?php

namespace App\Models;

use App\Models\DeclarationCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropheticDeclaration extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function declarationCategory()
    {
        return $this->belongsTo(DeclarationCategory::class);
    }
}
