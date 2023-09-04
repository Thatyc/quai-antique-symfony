<?php



namespace App\Controller;

use App\Entity\Order;
use App\Entity\Horaire;
use App\Entity\User;
use App\Form\OrderType;
use App\Repository\HoraireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private Security $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;

    }

    #[Route('/order', name: 'app_order')]
    public function reservation(Request $request)
    {
        $user = $this->security->getUser();

        $order = new Order();

        if($user instanceof User) {

            $order->setEmail($user->getUserIdentifier());
            $order->setName($user->getName());
            $order->setAllergies($user->getAllergies());
            
        } 

        // Obtenez les horaires disponibles depuis la base de données (exemple)
        $horairesDisponibles = $this->entityManager->getRepository(Horaire::class)->findAll();

        
        $form = $this->createForm(OrderType::class, $order, [
            'horaires' => $horairesDisponibles,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $selectedDate = $order->getDate();
            if ($selectedDate instanceof \DateTimeInterface && $selectedDate->format('N') == 1) {
                $this->addFlash('error', 'Nous sommes fermés les lundis !');
            } else {
                if ($user instanceof User) {
                    $user->setAllergies($order->getAllergies());
                    $this->entityManager->persist($user);
                }
                    $this->entityManager->persist($order);
                    $this->entityManager->flush();

                    $this->addFlash('success', 'Réservation effectuée avec succès !');
            }
            
        }

        return $this->render('order/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}