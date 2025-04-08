<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{

    protected $fillable = [
        'user_id',
        'HirReq_id',
        'cv',
      
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hiringRequest()
    {
        return $this->belongsTo(HiringRequest::class);
    }
    public function interview()
{
    return $this->hasOne(Interview::class);
}
}
