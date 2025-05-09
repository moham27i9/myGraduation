<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{

    protected $fillable = [
        'title',
        'issueNumber',
        'category',
        'total_cost',
        'due',
        'description',
        'user_id',
        'status',
        'priority',
        'num_of_payments',
    ];
    public function invoices()
{
    return $this->hasMany(Invoice::class);
}
    public function sessions()
{
    return $this->hasMany(Session::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}

public function attend_demand()
{
    return $this->hasMany(AttendDemand::class);
}
}
