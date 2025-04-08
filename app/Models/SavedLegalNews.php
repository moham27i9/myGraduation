<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedLegalNews extends Model
{
    protected $fillable = [
        'user_id',
        'legalNews_id',
      
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
