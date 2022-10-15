<?php

namespace App\Service;

use App\Entity\User\User;
use App\Repository\BuddyRequestRepository;
use App\Repository\UserRepository;

class BuddySearchEngine
{
    private UserRepository $userRepository;
    private BuddyRequestRepository $buddyRequestRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, BuddyRequestRepository $buddyRequestRepository)
    {
        $this->userRepository = $userRepository;
        $this->buddyRequestRepository = $buddyRequestRepository;
    }


    public function getCandidate(User $user):? User
    {
        $buddyRequests = $this->buddyRequestRepository->findByUser($user);
        $buddyRequestIds = array_map(function($item) {
            return $item->getBuddy()->getId();
        }, $buddyRequests);

        if ($buddyRequestIds === null) {
            $buddyRequestIds = [];
        }

        $buddyRequestIds[] = $user->getId();

        return $this->userRepository->findRandomUserNotIds($buddyRequestIds);
    }
}