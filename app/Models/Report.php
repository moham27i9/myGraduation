<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'employee_id',
        'description',
        'type',
      
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
