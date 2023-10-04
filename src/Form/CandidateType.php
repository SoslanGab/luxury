<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('first_name', TextType::class, [
            'required' => true,
           
        ])
        ->add('last_name', TextType::class, [
            'required' => true,
         
        ])
        ->add('current_location', TextType::class, [
            'required' => true,
         
        ])
        ->add('adress', TextType::class, [
            
        ])
        ->add('country', TextType::class, [
        
        ])
        ->add('nationality', TextType::class, [
          
        ])
        ->add('birth_at', DateType::class, [
            'widget' => 'single_text',
          
        ])
        ->add('place_of_birth', TextType::class, [
            
        ])
        ->add('short_description', TextType::class, [
            'required' => false, // Remove this if description is mandatory
          
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}

