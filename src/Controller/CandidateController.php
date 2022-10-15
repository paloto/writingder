<?php

namespace App\Controller;

use App\Entity\Buddy\BuddyRequest;
use App\Entity\Buddy\BuddyRequestStatus;
use App\Entity\User\User;
use App\Service\BuddySearchEngine;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidateController extends AbstractController
{
    #[Route('/candidate/get', name: 'app_candidate_get')]
    public function getCandidate(BuddySearchEngine $buddySearchEngine): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        $candidate = $buddySearchEngine->getCandidate($user);

        return $this->render('candidate/get.html.twig', [
            'candidate' => $candidate,
        ]);
    }

    #[Route('/candidate/{buddy}/request', name: 'app_candidate_request')]
    public function requestCandidate(Request $request, User $buddy, EntityManagerInterface $em): Response
    {
        $buddyRequest = new BuddyRequest();
        $buddyRequest->setUser($this->getUser());
        $buddyRequest->setBuddy($buddy);
        $buddyRequest->setStatus(BuddyRequestStatus::SENT);

        $em->persist($buddyRequest);
        $em->flush();

        $this->addFlash('success', 'Buddy request sent!');

        return $this->redirectToRoute('app_candidate_get');
    }

    #[Route('/candidate/{buddy}/discard', name: 'app_candidate_discard')]
    public function discardCandidate(Request $request, User $buddy, EntityManagerInterface $em): Response
    {
        $buddyRequest = new BuddyRequest();
        $buddyRequest->setUser($this->getUser());
        $buddyRequest->setBuddy($buddy);
        $buddyRequest->setStatus(BuddyRequestStatus::DISCARDED);

        $em->persist($buddyRequest);
        $em->flush();

        return $this->redirectToRoute('app_candidate_get');
    }
}
