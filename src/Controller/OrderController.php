<?php



namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderType;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class OrderController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/order', name: 'app_order')]
    public function reservation(Request $request): Response
    {
        $order = new Order();

        $form = $this->createForm(OrderType::class, $order);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // Convertir la chaîne de caractères en objet DateTime
            $timeString = $form->get('time')->getData();
            dump($timeString);

            $time = DateTime::createFromFormat('H:i', $timeString);
            dump($time);

            if ($time) {
                $order->setTime($time);
                
                $this->entityManager->persist($order);
                $this->entityManager->flush();

                // Ajouter un message de succès pour la réservation
                $this->addFlash('success', 'Votre réservation a été enregistrée.');

                // Rediriger vers une page de succès ou toute autre page nécessaire.
                #return $this->redirectToRoute('app_homepage');
            } else {
                // Si la conversion échoue, ajouter un message d'erreur
                $this->addFlash('error', 'Erreur : Heure de réservation invalide.');
            }
        }

        return $this->render('order/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
