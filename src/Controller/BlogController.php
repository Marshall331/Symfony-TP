<?php

namespace App\Controller;

use PhpParser\Node\Expr\Cast\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\String\Slugger\SluggerInterface;

class BlogController extends AbstractController
{
    #[Route('/blog/{id}/{nom}', name: 'app_blog', requirements: ['id' => '\d+', 'nom' => '[a-zA-Z]{3,15}'])]
    public function index($id, $nom): Response
    {
        return $this->render(
            'blog/index.html.twig',
            [
                'id' => $id,
                'nom' => $nom,
            ]
        );
    }

    #[Route('/hello', name: 'app_hello')]
    public function hello(): Response
    {
        return new Response('Hello');
    }
}
