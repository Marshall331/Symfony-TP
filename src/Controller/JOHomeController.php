<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/JO')]
class JOHomeController extends AbstractController
{
    #[Route('/', name: 'jo_app_home', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('home/home.html.twig');
    }
}
