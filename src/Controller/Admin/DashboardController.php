<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use App\Entity\Menu;
use App\Entity\Order;
use App\Entity\Table;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
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
        yield MenuItem::linkToCrud('Table', 'fas fa-tablet', Table::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Horaire', 'fas fa-user', Horaire::class);
    }
}
