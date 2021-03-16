<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/user/view/{id}', name: 'user_view')]
    public function view(int $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(User::class);
        $user = $rep->find($id);
        return $this->render('user/view.html.twig', [
           'user' => $user
        ]);
    }
}
