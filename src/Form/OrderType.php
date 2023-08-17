<?php

// src/Form/OrderType.php

namespace App\Form;

use App\Entity\Horaire;
use App\Entity\Order;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->security->getUser();

        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre nom',
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre mail',
                'data' => $user ? $user->getUserIdentifier() : null,
            ])
            ->add('phone', TextType::class, [
                'label' => 'Votre numéro de téléphone',
            ])
            ->add('allergies', TextType::class, [
                'label' => 'Avez-vous des allergies ?',
                
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
            ->add('heure', EntityType::class, [
                'class' => Horaire::class,
                'choices' => $options['horaires'],
                'choice_label' => function (Horaire $horaire) {
                    return $horaire->getHeure()->format('H:i');
                },
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
            'horaires' => [],
        ]);
    }
}
