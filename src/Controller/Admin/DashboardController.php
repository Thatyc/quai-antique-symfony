<?php

namespace App\Controller\Admin;

use App\Entity\Admin;
use App\Entity\Horaire;
use App\Entity\Menu;
use App\Entity\Order;
use App\Entity\Table;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator) {}

    #[Route('/admin', name: 'admin')]
    #[IsGranted("ROLE_ADMIN")]
    public function index(): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {

            $this->addFlash('warning', 'Vous n\'avez pas les autorisations nécessaires pour accéder à cette page.');

            return new RedirectResponse($this->generateUrl('app_login')); // Changez 'home' pour le nom de la route souhaitée
        }

        
        $url = $this->adminUrlGenerator
        ->setController(OrderCrudController::class)
        ->generateUrl();


        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Quai-Antique Administration');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Menu', 'fas fa-utensils', Menu::class);
        yield MenuItem::linkToCrud('Order', 'fas fa-book-reader', Order::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Horaire', 'fas fa-user', Horaire::class);
    }

}
