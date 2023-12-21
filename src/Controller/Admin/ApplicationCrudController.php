<?php

namespace App\Controller\Admin;

use App\Entity\Application;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Bundle\SecurityBundle\Security;

class ApplicationCrudController extends AbstractCrudController
{
    public function __construct(
        private Security $security
    ) {
    }

    public static function getEntityFqcn(): string
    {

        return Application::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
