<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

class PostController extends AbstractController
{
    #[Route('/post', name: 'post')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Post::class);
        $posts = $rep->findAll();
        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }

    #[Route('/post/view/{id}', name: 'post_view')]
    public function view(int $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Post::class);
        $post = $rep->find($id);

        return $this->render('post/view.html.twig', [
            'post' => $post
        ]);
    }

    // #[Route('/post/add', name: 'post_add')]
    // public function post_add(): Response
    // {
    //     $task = new Post();
    //     $task->setCreatedAt(new \DateTime);
    //     $task->setIsDeleted(false);
    //     $task->setIsPublished(true);
    //     $this->createFormBuilder($task);
    //     return $this->render('post/create.html.twig', [
    //         'controller_name' => 'PostController',
    //     ]);
    // }
}
