<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'session_id',
        'file',
 
    ];
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
