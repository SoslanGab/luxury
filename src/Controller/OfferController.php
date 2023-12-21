<?php

namespace App\Controller;

use App\Entity\Offer;
use App\Form\OfferType;
use App\Repository\ApplicationRepository;
use App\Repository\OfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/offer')]
class OfferController extends AbstractController
{
    #[Route('/', name: 'app_offer_index', methods: ['GET'])]
    public function index(OfferRepository $offerRepository): Response
    {
        return $this->render('offer/index.html.twig', [
            'offers' => $offerRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_offer_show', methods: ['GET'])]
    public function show(Offer $offer, ApplicationRepository $applicationRepository): Response
    {
        if ($this->getUser()) {
            $candidate = $this->getUser()->getCandidate();
            $isApplicationExist = $applicationRepository->findOneBy([
                'candidate' => $candidate,
                'offer' => $offer,
            ]);
            return $this->render('offer/show.html.twig', [
                'offer' => $offer,
                'isApplicationExist' => $isApplicationExist,
            ]);
        }

        return $this->render('offer/show.html.twig', [
            'offer' => $offer,
        ]);
    }
}
