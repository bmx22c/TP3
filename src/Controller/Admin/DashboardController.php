<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\RouteMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Comment;
use App\Entity\Post;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//        return parent::index();

        $menu = [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::linkToCrud('User', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Comment', 'fa fa-comments', Comment::class),
            MenuItem::linkToCrud('Post', 'fa fa-envelope', Post::class),
        ];

        return $this->render('admin/index.html.twig', [
            'menu' => $menu
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony Tp');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::linkToCrud('User', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Comment', 'fa fa-comments', Comment::class),
            MenuItem::linkToCrud('Post', 'fa fa-envelope', Post::class),
        ];

//        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
