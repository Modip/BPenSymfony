<?php

namespace App\Form;

use App\Entity\Compte;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime as ConstraintsDateTime;

class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numerocompte',TextType::class,array('label'=>'Numero de compte', 'attr'=>array('class'=>'form-control')))
            ->add('solde',TextType::class,array('label'=>'Solde', 'attr'=>array('class'=>'form-control')))
            ->add('clerib',TextType::class,array('label'=>'Cle RIB', 'attr'=>array('class'=>'form-control')))
            ->add('agios',TextType::class,array('label'=>'Agios', 'attr'=>array('class'=>'form-control')))
            ->add('date',DateTimeType::class,array('label'=>'Date d\'ouverture', 'attr'=>array('class'=>'form-control')))
            ->add('cltphysique_id')
            ->add('cltmoral_id')
            ->add('agence_id')
            ->add('typecomte_id')
            ->add('Ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
