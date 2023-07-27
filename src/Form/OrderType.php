<?php

// src/Form/OrderType.php

namespace App\Form;
use App\Entity\Order;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType; 
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre nom',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre mail',
            ])
            ->add('phone', TextType::class, [
                'label' => 'Votre numéro de téléphone',
            ])
            ->add('allergies', TextType::class, [
                'label' => 'Avez-vous des allergies ?',
                'required' => false,
            ])
            ->add('person', IntegerType::class, [
                'label' => 'Nombre de couverts',
                'data' => 1,
            ])
            ->add('date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('time', ChoiceType::class, [
                'label' => 'Choisissez l\'heure de la réservation',
                'choices' => [
                    '19:30' => '19:30',
                    '20:00' => '20:00',
                    '20:30' => '20:30',
                    '21:00' => '21:00',
                    '21:30' => '21:30',
                    '22:00' => '22:00',
                    '22:30' => '22:30',
                ],
                'expanded' => true, // Cette option affiche des boutons plutôt qu'une liste déroulante
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
