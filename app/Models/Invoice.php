<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
       
        'status',
        'amount',
        'issue_id',
        'user_id',
        'created_by',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
