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

    public function create(array $data,$id)
    {
        return DB::transaction(function () use ($data,$id) {
            // تحديث role_id للمستخدم إلى 5 (محامي)
            $user = User::findOrFail($id);
            $user->role_id = 5;
            $user->save();

            // إنشاء المحامي
            return $this->lawyerRepository->create($data,$id);
        });
    }

    // app/Services/LawyerService.php

public function getAll()
{
    return $this->lawyerRepository->getAll();
}

public function getById($id)
{
    return $this->lawyerRepository->getById($id);
}

public function update($id, $data)
{
    return $this->lawyerRepository->update($id, $data);
}

public function delete($id)
{
    $lawyer = $this->lawyerRepository->getById($id);
    $user = $lawyer->user;
    $user->role_id = 2;
    $user->save();

    return $this->lawyerRepository->delete($id);
}

}
