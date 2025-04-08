<?php

namespace App\Repositories;

use App\Models\Lawyer;

class LawyerRepository
{
    public function create(array $data)
    {
        return Lawyer::create([
            'user_id' => $data['user_id'],
            'license_number' => $data['license_number'],
            'experience_years' => $data['experience_years'],
            'type' => $data['type'],
            'specialization' => $data['specialization'],
            'salary' => $data['salary'],
            'certificate' => $data['certificate'],
        ]);
    }
}
