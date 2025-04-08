<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $fillable = [
        'license_number',
        'experience_years',
        'salary',
        'certificate',
        'type',
        'user_id',
        'specialization',
    ];
    public function leaves()
    {
        return $this->morphMany(FurLoughRequest::class, 'covet_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
    public function attend_demand()
    {
        return $this->hasMany(AttendDemand::class);
    }
}
