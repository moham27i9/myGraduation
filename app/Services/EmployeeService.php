<?php

namespace App\Services;
use App\Traits\ApiResponseTrait;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\EmployeeRepository;

class EmployeeService
{
         use ApiResponseTrait; 
    protected $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function list()
    {
        $employee = $this->employeeRepository->getAll();
        return $this->successResponse($employee, 'success');  
    }

    public function create($id,$data)
    {
        return DB::transaction(function () use ($data,$id) {
            // تحديث role_id للمستخدم إلى 5 (محامي)
            $user = User::findOrFail($id);
        
            // تحديد الدور حسب النوع
            if (strtolower($data['type']) === 'hr') {
                $user->role_id = 3;
                $user->save();
            } elseif (strtolower($data['type']) === 'accountant') {
                $user->role_id = 4;
                $user->save();
            }
            $employee = $this->employeeRepository->create([
                'hire_date' => $data['hire_date'],
                'salary' => $data['salary'],
                'certificate' => $data['certificate'],
                'user_id'=> $id
                
            ]);
            return $this->successResponse($employee, 'Employee added successfully'); 
        });
        
        return $this->errorResponse('Employee added failed', 500);
    }

    public function show($id)
    {
        $employee = $this->employeeRepository->find($id);
        return $this->successResponse($employee, 'success');  
    }

    public function update($id, $data)
    {
        $employee = $this->employeeRepository->update($id, $data);
        return $this->successResponse($employee, 'success');  
        return $this->errorResponse('Updated failed', 500);
    }

    public function delete($id)
    {
        $employee = $this->employeeRepository->getById($id);
        $user = $employee->user;
        $user->role_id = 2;
        $user->save();
        $employee = $this->employeeRepository->delete($id);
        return $this->successResponse($employee, 'Deleted successfully');  
        return $this->errorResponse('Deleted failed', 500);
    }
}
