<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
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
        // comment 1
        $profile = $this->profileService->create($request->validated());
        return $this->successResponse($profile, 'Profile created successfully');
    }

        public function show()
    {
        $profile = $this->profileService->getByCurrentUser();
        return $this->successResponse($profile, 'profile retrieved successfully');
    }

    public function update(UpdateProfileRequest $request)
    {

        $profile = $this->profileService->updateCurrentUser($request->validated());
        return $this->successResponse($profile, 'Profile updated successfully');
    }

    public function destroy()
    {
        $this->profileService->deleteCurrentUser();
        return $this->successResponse(null, 'Profile deleted successfully ');
    }

}
