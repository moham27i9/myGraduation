<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'date',
        'jobApp_id',
      
    ];

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }
}
