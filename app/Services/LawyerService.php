<?php

namespace App\Services;

use App\Repositories\LawyerRepository;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class LawyerService
{
    protected $lawyerRepository;

    public function __construct(LawyerRepository $lawyerRepository)
    {
        $this->lawyerRepository = $lawyerRepository;
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            // تحديث role_id للمستخدم إلى 5 (محامي)
            $user = User::findOrFail($data['user_id']);
            $user->role_id = 5;
            $user->save();

            // إنشاء المحامي
            return $this->lawyerRepository->create($data);
        });
    }
}
