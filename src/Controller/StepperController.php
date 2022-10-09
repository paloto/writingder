<?php

namespace App\Controller;

use App\Entity\User\User;
use App\Form\AgeRangeType;
use App\Form\CategoryType;
use App\Form\CountryType;
use App\Form\FavoriteWritersType;
use App\Form\FrequencyType;
use App\Form\LanguageType;
use App\Form\ModalityType;
use App\Form\ReadingTopicType;
use App\Form\WritingTopicType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StepperController extends AbstractController
{
    #[Route('/stepper/age', name: 'app_stepper_age')]
    public function age(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(AgeRangeType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $ageRange = $data['range'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setAgeRange($ageRange);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('stepper/age.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/country', name: 'app_stepper_country')]
    public function country(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CountryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $country = $data['country'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setCountry($country);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('stepper/country.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/language', name: 'app_stepper_language')]
    public function language(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(LanguageType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $language = $data['language'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setLanguage($language);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('stepper/language.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/modality', name: 'app_stepper_modality')]
    public function modality(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ModalityType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $modality = $data['modality'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setModality($modality);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('stepper/modality.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/category', name: 'app_stepper_category')]
    public function category(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CategoryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $category = $data['category'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setCategory($category);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
        return $this->render('stepper/category.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/writing_topic', name: 'app_stepper_writing_topic')]
    public function writingTopic(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(WritingTopicType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $writingTopic = $data['writing_topic'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setWritingTopic($writingTopic);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
        return $this->render('stepper/writing_topic.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/reading_topic', name: 'app_stepper_reading_topic')]
    public function readingTopic(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ReadingTopicType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $readingTopic = $data['reading_topic'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setReadingTopic($readingTopic);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
        return $this->render('stepper/reading_topic.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/favorite_writers', name: 'app_stepper_favorite_writers')]
    public function favoriteWriters(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(FavoriteWritersType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $favoriteWriters = array_values($data['favorite_writers']);

            /** @var User $user */
            $user = $this->getUser();
            $user->setFavoriteWriters($favoriteWriters);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
        return $this->render('stepper/favorite_writers.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/stepper/frequency', name: 'app_stepper_frequency')]
    public function frequency(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(FrequencyType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $frequency = $data['frequency'];

            /** @var User $user */
            $user = $this->getUser();
            $user->setFrecuency($frequency);

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }
        return $this->render('stepper/frequency.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
