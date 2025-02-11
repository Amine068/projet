<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Category;
use App\Entity\Subcategory;
use Psr\Log\LoggerInterface;
use App\Form\FormExtention\HoneyPotType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceType extends HoneyPotType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('price', MoneyType::class)
            ->add('state')
            ->add('city', TextType::class)
            ->add('zipcode', TextType::class)
            ->add('isVisible')
            ->add('telephone', TextType::class)
            ->add('subCategory', EntityType::class, [
                'class' => Subcategory::class,
                'choice_label' => 'name',
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
