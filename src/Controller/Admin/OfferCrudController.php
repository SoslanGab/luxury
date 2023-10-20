<?php

namespace App\Controller\Admin;

use App\Entity\Offer;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;

class OfferCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {

        return Offer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('reference'),
            AssociationField::new('client'),
            TextField::new('description'),
            BooleanField::new('isActive'),
            TextField::new('jobTitle'),
            TextField::new('jobLocation'),
            AssociationField::new('category'),
            DateTimeField::new('closingAt'),
            NumberField::new('salary'),
            DateTimeField::new('createdAt'),
            AssociationField::new('jobType'),

        ];
    }
}
