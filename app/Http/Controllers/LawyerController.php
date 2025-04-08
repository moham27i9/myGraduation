<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLawyerRequest;
use App\Services\LawyerService;
use App\Traits\ApiResponseTrait;

class LawyerController extends Controller
{
    use ApiResponseTrait;

    protected $lawyerService;

    public function __construct(LawyerService $lawyerService)
    {
        $this->lawyerService = $lawyerService;
    }

    public function store(CreateLawyerRequest $request)
    {
        $lawyer = $this->lawyerService->create($request->validated());
        return $this->successResponse($lawyer, 'Lawyer created successfully');
        return $this->errorResponse('Lawyer created failed', 500);
    }
}

