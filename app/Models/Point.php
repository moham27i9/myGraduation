<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'rate',
        'session_id',
    
    ];
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
