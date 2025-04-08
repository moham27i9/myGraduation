<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HiringRequest extends Model
{
    protected $fillable = [
        'jopTitle',
        'created_by',
        'status',
        'type',
        'description',
      
    ];

    public function jobApplication()
    {
        return $this->hasMany(JobApplication::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
