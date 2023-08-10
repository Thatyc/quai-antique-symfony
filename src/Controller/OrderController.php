<?php



namespace App\Controller;

use App\Entity\Order;
use App\Entity\Horaire;
use App\Form\OrderType;
use App\Repository\HoraireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/order', name: 'app_order')]
    public function reservation(Request $request)
    {
        // Obtenez les horaires disponibles depuis la base de données (exemple)
        $horairesDisponibles = $this->entityManager->getRepository(Horaire::class)->findAll();

        $order = new Order();
        $form = $this->createForm(OrderType::class, $order, [
            'horaires' => $horairesDisponibles,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitez la réservation ici
            // Par exemple, enregistrez la commande dans la base de données
            $this->entityManager->persist($order);
            $this->entityManager->flush();

            $this->addFlash('success', 'Réservation effectuée avec succès !');
        } else {
            // Si la conversion échoue, ajouter un message d'erreur
            $this->addFlash('error', 'Erreur : Heure de réservation invalide.');
        }

        return $this->render('order/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
}