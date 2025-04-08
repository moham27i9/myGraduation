<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalBook extends Model
{
    protected $fillable = [
        'book',
        'bookTitle',
      
    ];
    public function SavedLegalBook()
    {
        return $this->hasMany(SavedLegalBook::class);
    }
}
