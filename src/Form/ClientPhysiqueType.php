<?php

namespace App\Form;

use App\Entity\ClientPhysique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientPhysiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom',TextType::class,array('label'=>'Prenom', 'attr'=>array('class'=>'form-control')))
            ->add('nom',TextType::class,array('label'=>'Nom', 'attr'=>array('class'=>'form-control')))
            ->add('adresse',TextType::class,array('label'=>'Adresse', 'attr'=>array('class'=>'form-control')))
            ->add('telephone',TextType::class,array('label'=>'Telephone', 'attr'=>array('class'=>'form-control')))
            ->add('email',TextType::class,array('label'=>'Email', 'attr'=>array('class'=>'form-control')))
            ->add('password',TextType::class,array('label'=>'Mot de Passe','attr'=>array('class'=>'form-control')))
            ->add('login',TextType::class,array('label'=>'Login', 'attr'=>array('class'=>'form-control')))
            ->add('employeur')
            ->add('Ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ClientPhysique::class,
        ]);
    }
}
