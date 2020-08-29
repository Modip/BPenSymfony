<?php

namespace App\Form;

use App\Entity\Compteph;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComptephType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numerocompte',TextType::class,array('label'=>'Numero de compte', 'attr'=>array('class'=>'form-control'))
            )
            ->add('solde',TextType::class,array('label'=>'Solde initial', 'attr'=>array('class'=>'form-control'))
            )
            ->add('clerib',TextType::class,array('label'=>'Cle RIB', 'attr'=>array('class'=>'form-control'))
            )
            ->add('agios',TextType::class,array('label'=>'Agios', 'attr'=>array('class'=>'form-control'))
            )
            ->add('clientphysique')
            ->add('typecompte')
            ->add('agence')
            ->add('Ajouter', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compteph::class,
        ]);
    }
}
