<?php

namespace App\Controller;

use App\Repository\ApplicationRepository;
use App\Repository\OfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(OfferRepository $offerRepository, ApplicationRepository $applicationRepository): Response
    {
        if ($this->getUser()) {
            $applicationsFromUser = $applicationRepository->findBy([
                'candidate' => $this->getUser()->getCandidate(),
            ]);

            return $this->render('main/index.html.twig', [
                'offers' => $offerRepository->findAll(),
                'applicationsFromUser' => $applicationsFromUser,
            ]);
        }

        return $this->render('main/index.html.twig', [
            'offers' => $offerRepository->findAll(),
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig', []);
    }

    #[Route('/compagny', name: 'app_compagny')]
    public function compagny(): Response
    {
        return $this->render('main/compagny.html.twig', []);
    }
}
