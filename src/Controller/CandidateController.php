<?php

namespace App\Controller;

use App\Form\CandidateType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/candidate')]
class CandidateController extends AbstractController
{
    #[Route('/profil', name: 'app_candidate_profil', methods: ['GET', 'POST'])]
    public function profil(
        Request $request,
        EntityManagerInterface $entityManager,
    ): Response {

        $candidate = $this->getUser()->getCandidate();
        $form = $this->createForm(CandidateType::class, $candidate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();
            return $this->redirectToRoute('app_candidate_profil', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidate/edit.html.twig', [
            'candidate' => $candidate,
            'form' => $form,
        ]);
    }

    #[Route('/delete', name: 'app_candidate_delete', methods: ['GET'])]
    public function delete(
        EntityManagerInterface $entityManager,
    ): Response {

        $candidate = $this->getUser()->getCandidate();
        $entityManager->remove($candidate);
        $entityManager->remove($this->getUser());
        $entityManager->flush();

        return $this->redirectToRoute('app_logout');
    }
}
