<?php

namespace App\Controller;

use App\Entity\User\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        if(empty($user->getAgeRange())) {
            return $this->redirectToRoute('app_stepper_age');
        }
        if(empty($user->getCountry())) {
            return $this->redirectToRoute('app_stepper_country');
        }
        if(empty($user->getLanguage())) {
            return $this->redirectToRoute('app_stepper_language');
        }
        if(empty($user->getModality())) {
            return $this->redirectToRoute('app_stepper_modality');
        }
        if(empty($user->getCategory())) {
            return $this->redirectToRoute('app_stepper_category');
        }
        if(empty($user->getWritingTopic())) {
            return $this->redirectToRoute('app_stepper_writing_topic');
        }
        if(empty($user->getReadingTopic())) {
            return $this->redirectToRoute('app_stepper_reading_topic');
        }
        if(empty($user->getFavoriteWriters())) {
            return $this->redirectToRoute('app_stepper_favorite_writers');
        }
        if(empty($user->getFrecuency())) {
            return $this->redirectToRoute('app_stepper_frequency');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
