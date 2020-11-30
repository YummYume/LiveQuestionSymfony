<?php

namespace App\Form;

use App\Entity\Profile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('mail')
            ->add('password')
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Male' => Profile::GENDER_MAN,
                    'FEMALE' => Profile::GENDER_WOMAN,
                    'Non Binaire' =>  Profile::GENDER_NON_BINAIRE,
                ]
            ])
            ->add('picture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
        ]);
    }
}
