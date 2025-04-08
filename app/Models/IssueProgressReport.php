<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueProgressReport extends Model
{
    protected $fillable = [
        'session_id',
        'pre_session_count',
        'report',
 
    ];
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
