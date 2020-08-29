<?php

namespace App\Form;

use App\Entity\Comptemor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComptemorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('solde',TextType::class,array('label'=>'Solde initial', 'attr'=>array('class'=>'form-control'))
        )
        ->add('frais')
            ->add('date')
            ->add('Client')
            ->add('agence')
            ->add('Ajouter', SubmitType::class)
            ;

        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comptemor::class,
        ]);
    }
}
