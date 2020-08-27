<?php

namespace App\Form;

use App\Entity\ClientMoral;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientMoralType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('label'=>'Nom', 'attr'=>array('class'=>'form-control')))
            ->add('adresse',TextType::class,array('label'=>'Adresse', 'attr'=>array('class'=>'form-control')))
            ->add('telephone',TextType::class,array('label'=>'Telephone', 'attr'=>array('class'=>'form-control')))
            ->add('email',TextType::class,array('label'=>'Email', 'attr'=>array('class'=>'form-control')))
            ->add('login',TextType::class,array('label'=>'Login', 'attr'=>array('class'=>'form-control')))
            ->add('password',TextType::class,array('label'=>'Mot de passe', 'attr'=>array('class'=>'form-control')))
            ->add('Ajouter', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientMoral::class,
        ]);
    }
}
