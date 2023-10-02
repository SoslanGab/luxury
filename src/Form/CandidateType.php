<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('adress')
            ->add('country')
            ->add('nationality')
            ->add('isPassportValid')
            ->add('passportFile')
            ->add('cv')
            ->add('profilPicture')
            ->add('currentLocation')
            ->add('birthAt')
            ->add('placeOfBirth')
            ->add('isAvailable')
            ->add('shortDescription')
            ->add('notes')
            ->add('user')
            ->add('gender')
            ->add('category')
            ->add('experience')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
