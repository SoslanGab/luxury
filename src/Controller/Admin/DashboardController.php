<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ) {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        if ($this->isGranted('ROLE_ADMIN')) {

            $url = $this->adminUrlGenerator
                ->setController(ClientCrudController::class)
                ->generateUrl();

            return $this->redirect($url);
        } else {
            return $this->redirectToRoute('app_login');
        }
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Luxury Service');
    }

    public function configureMenuItems(): iterable
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
            yield MenuItem::linkToCrud('Client', 'fas fa-list', ClientCrudController::getEntityFqcn());
            yield MenuItem::subMenu('Actions')->setSubItems([
                MenuItem::linkToCrud('add client', 'fas fa-plus', ClientCrudController::getEntityFqcn())->setAction('new'),
            ]);
            yield MenuItem::linkToCrud('Offer', 'fas fa-list', OfferCrudController::getEntityFqcn());
            yield MenuItem::subMenu('Actions')->setSubItems([
                MenuItem::linkToCrud('add offer', 'fas fa-plus', OfferCrudController::getEntityFqcn())->setAction('new'),
            ]);
            yield MenuItem::linkToCrud('Application', 'fas fa-list', ApplicationCrudController::getEntityFqcn());
        } else {
            return $this->redirectToRoute('app_login');
        }
    }
}
