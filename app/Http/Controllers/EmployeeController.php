<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        return $this->employeeService->list();
    }

    public function store(Request $request,$id)
    {
        $validated = $request->validate([
            'hire_date' => 'required|date',
            'salary' => 'required|numeric',
            'certificate' => 'required|string',
        ]);
        return $this->employeeService->create($id,$validated);
    }

    public function show($id)
    {
        return $this->employeeService->show($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hire_date' => 'sometimes|date',
            'salary' => 'sometimes|numeric',
            'certificate' => 'sometimes|string',
        ]);
        return $this->employeeService->update($id, $validated);
    }

    public function destroy($id)
    {
        $this->employeeService->delete($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}

