<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestTwigController extends AbstractController
{
    #[Route('/test/twig', name: 'app_test_twig')]
    public function index(): Response
    {
        $users = [];

        $user = ['full_name' => 'Nonne', 'age' => 25];
        $users[] = $user;

        $user = ['full_name' => 'Pelleau', 'age' => 75];
        $users[] = $user;

        $user = ['full_name' => 'Chanouha', 'age' => 124];
        $users[] = $user;

        $user = ['full_name' => 'Bruel', 'age' => 15];
        $users[] = $user;

        $user = ['full_name' => 'Teste', 'age' => 8];
        $users[] = $user;

        $user = ['full_name' => 'Stolf', 'age' => 28];
        $users[] = $user;

        $user = ['full_name' => 'Sotin', 'age' => 5];
        $users[] = $user;

        return $this->render('test_twig/index.html.twig', [
            'title' => 'page accueil',
            'users' => $users
        ]);
    }
}
