<?php

namespace App\Services;
use App\Traits\ApiResponseTrait;
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

       $employee = $this->employeeRepository->create([
            'hire_date' => $data['hire_date'],
            'salary' => $data['salary'],
            'certificate' => $data['certificate'],
            'user_id'=> $id
            
        ]);
        return $this->successResponse($employee, 'Employee added successfully');  
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
        $employee = $this->employeeRepository->delete($id);
        return $this->successResponse($employee, 'Deleted successfully');  
        return $this->errorResponse('Deleted failed', 500);
    }
}
