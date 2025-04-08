<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulation extends Model
{
    protected $fillable = [
        'user_id',
        'lawyer_id',
        'description',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }
}
