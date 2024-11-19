<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/blog')]
class BlogController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    public function hello(): Response
    {
        return new Response('Hello');
    }

    #[Route('/{id}/{nom}', name: 'app_blog_indexOld', requirements: ['id' => '\d+', 'nom' => '[a-zA-Z]{3,15}'])]
    public function indexOld($id, $nom): Response
    {
        return $this->render(
            'blog/indexOld.html.twig',
            [
                'id' => $id,
                'nom' => $nom,
            ]
        );
    }

    #[Route('/{id}', name: 'app_blog_show', methods: ['GET'])]
    public function show(Article $article): Response
    {
        return $this->render(
            'blog/show.html.twig',
            [
                'article' => $article
            ]
        );
    }

    #[Route(name: 'app_blog_index', methods: ['GET'])]
    public function index(ArticleRepository  $articleRepository): Response
    {
        return $this->render(
            'blog/index.html.twig',
            [
                'articles' => $articleRepository->findAll()
            ]
        );
    }

    #[Route('/new', name: 'app_blog_new', methods: ['GET', 'POST'])]
    public function new($id, $nom): Response
    {
        return $this->render(
            'blog/indexOld.html.twig',
            [
                'id' => $id,
                'nom' => $nom,
            ]
        );
    }

    #[Route('/{id}/edit', name: 'app_blog_edit', methods: ['GET', 'POST'])]
    public function edit($id, $nom): Response
    {
        return $this->render(
            'blog/indexOld.html.twig',
            [
                'id' => $id,
                'nom' => $nom,
            ]
        );
    }

    #[Route('/{id}', name: 'app_blog_delete', methods: ['POST'])]
    public function delete($id, $nom): Response
    {
        return $this->render(
            'blog/indexOld.html.twig',
            [
                'id' => $id,
                'nom' => $nom,
            ]
        );
    }
}
