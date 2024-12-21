<?php

namespace App\Controller;

use App\Repository\MemberJORepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
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

    // Méthode permettant de switch rapidement de compte (utilisé pour le dev)
    #[Route('/connexion_dev/{role}', name: 'jo_login_dev', methods: ['GET'])]
    public function login_dev(string $role, Security $security, MemberJORepository $userRepository): Response
    {
        $user = $userRepository->createQueryBuilder('u')
            ->where('u.roles LIKE :role')
            ->setParameter('role', '%"' . $role . '"%')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$user) {
            $this->addFlash('warning', "Aucun utilisateur trouvé, vérifier que vous avez bien généré les données.");
        }

        $security->login($user, 'form_login', 'main');

        return $this->redirectToRoute('jo_app_home');
    }
}
