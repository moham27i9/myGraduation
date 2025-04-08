<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionAppointment extends Model
{
    protected $fillable = [
        'session_id',
        'date',
 
    ];
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
