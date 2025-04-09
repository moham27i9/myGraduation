<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Services\ProfileService;
use App\Traits\ApiResponseTrait;

class ProfileController extends Controller
{
    use ApiResponseTrait;

    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function store(CreateProfileRequest $request)
    {
        $profile = $this->profileService->create($request->validated());
        return $this->successResponse($profile, 'Profile created successfully');
    }
}
