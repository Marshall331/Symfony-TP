<?php

namespace App\Controller; // répertoire de tous nos contrôleurs

use Symfony\Component\HttpFoundation\Response; // cette classe permet de faire des Response
use Symfony\Component\Routing\Annotation\Route; // cette classe permet d'utiliser les annotations pour définir les routes
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; // super-classe des Contrôleurs

class DefaultController extends AbstractController
{
    #[Route('/home/')] // on définit la route /home pour cette fonction home
    public function home(): Response
    {
        return new Response('Hello KHALIL'); // on ne fait qu'afficher son nom de famille
    }
}
