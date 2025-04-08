<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'certificate',
        'salary',
        'hire_date',
        'user_id',
    ];
    public function leaves()
    {
        return $this->morphMany(FurLoughRequest::class, 'covet_by');
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function payroll()
    {
        return $this->hasMany(Payroll::class);
    }

    public function hiringRequest()
    {
        return $this->hasMany(HiringRequest::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
