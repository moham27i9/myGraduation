<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalNews extends Model
{

    protected $fillable = [
        'title',
        'description',
      
    ];
    public function savedLegalNews()
    {
        return $this->hasMany(SavedLegalNews::class);
    }
}
