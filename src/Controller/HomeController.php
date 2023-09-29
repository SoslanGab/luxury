<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('index', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/company', name: 'company')]
    public function company(): Response
    {
        return $this->render('/company.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('/contact.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/jobs', name: 'jobs')]
    public function jobs(): Response
    {
        return $this->render('jobs/jobs.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/show', name: 'show')]
    public function show(): Response
    {
        return $this->render('jobs/show.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('auth/login.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    #[Route('/register', name: 'register')]
    public function register(): Response
    {
        return $this->render('auth/register.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}