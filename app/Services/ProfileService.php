<?php

namespace App\Services;

use App\Repositories\ProfileRepository;

class ProfileService
{
    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function create(array $data)
    {
        return $this->profileRepository->create($data);
    }

        public function getByCurrentUser()
    {
        return $this->profileRepository->findByUserId(auth()->id());
    }

    public function updateCurrentUser(array $data)
    {
        return $this->profileRepository->updateByUserId(auth()->id(), $data);
    }

    public function deleteCurrentUser()
    {
        return $this->profileRepository->deleteByUserId(auth()->id());
    }

}
