<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedLegalBook extends Model
{

    protected $fillable = [
        'user_id',
        'legalbook_id',
      
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
