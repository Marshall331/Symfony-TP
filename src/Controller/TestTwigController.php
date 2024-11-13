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

        $user = ['createdAt' => $this->getRandomDate(), 'full_name' => 'Nonne', 'age' => 25, 'image' => rand(1, 500)];
        $users[] = $user;

        $user = ['createdAt' => $this->getRandomDate(), 'full_name' => 'Pelleau', 'age' => 75, 'image' => rand(1, 500)];
        $users[] = $user;

        $user = ['createdAt' => $this->getRandomDate(), 'full_name' => 'Chanouha', 'age' => 124, 'image' => rand(1, 500)];
        $users[] = $user;

        $user = ['createdAt' => $this->getRandomDate(), 'full_name' => 'Bruel', 'age' => 15, 'image' => rand(1, 500)];
        $users[] = $user;

        $user = ['createdAt' => $this->getRandomDate(), 'full_name' => 'Teste', 'age' => 8, 'image' => rand(1, 500)];
        $users[] = $user;

        $user = ['createdAt' => $this->getRandomDate(), 'full_name' => 'Stolf', 'age' => 28, 'image' => rand(1, 500)];
        $users[] = $user;

        $user = ['createdAt' => $this->getRandomDate(), 'full_name' => 'Sotin', 'age' => 5, 'image' => rand(1, 500)];
        $users[] = $user;

        return $this->render('test_twig/index.html.twig', [
            'title' => 'page accueil',
            'users' => $users
        ]);
    }

    private function getRandomDate(): String
    {
        return  rand(1900, 2025) . '/' . rand(1, 12) . '/' . rand(1, 29);
    }
}
