<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Models\User;

class ProfileRepository
{
    public function create(array $data)
    {
        $user_id = auth()->user()->id;
       
        return Profile::create([
           'phone'=> $data['phone'],
           'address'=> $data['address'],
           'age'=> $data['age'],
           'scientificLevel'=> $data['scientificLevel'],
           'user_id'=> $user_id,
        ]);
    }
}
