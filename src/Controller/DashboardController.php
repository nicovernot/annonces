<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Annonce;
use App\Entity\App;
use App\Entity\Menu;
use App\Entity\User;
use Psr\Log\LoggerInterface;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
      
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfo');
    }

    public function configureMenuItems(): iterable
    {   
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield  MenuItem::section('Annonces');
        yield MenuItem::linkToCrud('Annonces','fa fa-comment', Annonce::class);
        yield  MenuItem::section('Admin');
        yield MenuItem::linkToRoute('Api', 'fa fa-car', 'api_entrypoint');
        yield MenuItem::linkToCrud('App','fa fa-comment', App::class);
        yield MenuItem::linkToCrud('Menu','fa fa-comment', Menu::class);
        yield MenuItem::linkToCrud('User','fa fa-comment', User::class);
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}
