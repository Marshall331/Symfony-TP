<?php

namespace App\Controller;

use App\Entity\Pays;
use App\Form\PaysType;
use App\Repository\AthleteRepository;
use App\Repository\PaysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/JO/pays')]
final class PaysController extends AbstractController
{
    #[Route(name: 'app_pays_index', methods: ['GET'])]
    public function index(PaysRepository $paysRepository): Response
    {
        return $this->render('pays/index.html.twig', [
            'pays' => $paysRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pays_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pays = new Pays();
        $form = $this->createForm(PaysType::class, $pays);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pays);
            $entityManager->flush();

            $this->addFlash('success', message: 'Le pays a bien été créé !');
            return $this->redirectToRoute('app_pays_show', [
                'id' => $pays->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pays/new.html.twig', [
            'pays' => $pays,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pays_show', methods: ['GET'])]
    public function show(Pays $pays): Response
    {
        return $this->render('pays/show.html.twig', [
            'pays' => $pays,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pays_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pays $pays, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PaysType::class, $pays);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', message: 'Le pays a bien été modifié !');
            return $this->redirectToRoute('app_pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('pays/edit.html.twig', [
            'pays' => $pays,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pays_delete', methods: ['POST'])]
    public function delete(Request $request, Pays $pays, AthleteRepository $athleteRepository, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $pays->getId(), $request->getPayload()->getString('_token'))) {

            $athletes = $athleteRepository->findByPays($pays);

            foreach ($athletes as $athlete) {
                $athlete->setPays(null);
            }

            $entityManager->remove($pays);
            $entityManager->flush();
            $this->addFlash('success', message: 'Le pays a bien été supprimé !');
        }

        return $this->redirectToRoute('app_pays_index', [], Response::HTTP_SEE_OTHER);
    }
}
