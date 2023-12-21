<?php

namespace App\Controller;

use App\Entity\Application;
use App\Entity\Offer;
use App\Repository\ApplicationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{
    #[Route('/{id}/application', name: 'app_application')]
    public function application(
        Offer $offer,
        EntityManagerInterface $entityManager,
        ApplicationRepository $applicationRepository
    ): Response {
        $candidate = $this->getUser()->getCandidate();

        $application = new Application();
        $application->setStatus(true);
        $application->setCandidate($candidate);
        $application->setOffer($offer);

        $isApplicationExist = $applicationRepository->findOneBy([
            'candidate' => $candidate,
            'offer' => $offer,
        ]);


        if ($isApplicationExist) {

            return $this->redirectToRoute('app_offer_show', [
                'id' => $offer->getId(),
            ]);
        }

        $entityManager->persist($application);
        $entityManager->flush();

        return $this->redirectToRoute('app_offer_show', [
            'id' => $offer->getId(),
            'isApplicationExist' => $isApplicationExist,
        ]);
    }
}
