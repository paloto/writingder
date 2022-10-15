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
        $pathOfDataRequired = $this->getPathOfDataRequired();
        if ($pathOfDataRequired) {
            return $this->redirectToRoute($pathOfDataRequired);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    private function getPathOfDataRequired():? string
    {
        /** @var User $user */
        $user = $this->getUser();

        if(empty($user->getName())) {
            return 'app_stepper_name';
        }
        if(empty($user->getAgeRange())) {
            return 'app_stepper_age';
        }
        if(empty($user->getCountry())) {
            return 'app_stepper_country';
        }
        if(empty($user->getLanguage())) {
            return 'app_stepper_language';
        }
        if(empty($user->getModality())) {
            return 'app_stepper_modality';
        }
        if(empty($user->getCategory())) {
            return 'app_stepper_category';
        }
        if(empty($user->getWritingTopic())) {
            return 'app_stepper_writing_topic';
        }
        if(empty($user->getReadingTopic())) {
            return 'app_stepper_reading_topic';
        }
        if(empty($user->getFavoriteWriters())) {
            return 'app_stepper_favorite_writers';
        }
        if(empty($user->getFrecuency())) {
            return 'app_stepper_frequency';
        }
        if(empty($user->getBio())) {
            return 'app_stepper_bio';
        }
        if(empty($user->getImageName())) {
            return 'app_stepper_image';
        }
        return null;
    }
}
