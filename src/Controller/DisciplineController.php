<?php

namespace App\Controller;

use App\Entity\Discipline;
use App\Form\DisciplineType;
use App\Repository\DisciplineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/JO/discipline')]
final class DisciplineController extends AbstractController
{
    #[Route(name: 'app_discipline_index', methods: ['GET'])]
    public function index(DisciplineRepository $disciplineRepository): Response
    {
        return $this->render('discipline/index.html.twig', [
            'disciplines' => $disciplineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_discipline_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $discipline = new Discipline();
        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($discipline);
            $entityManager->flush();

            $this->addFlash('success', message: 'La discipline a bien été créée !');
            return $this->redirectToRoute('app_discipline_show', [
                'id' => $discipline->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('discipline/new.html.twig', [
            'discipline' => $discipline,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_discipline_show', methods: ['GET'])]
    public function show(Discipline $discipline): Response
    {
        return $this->render('discipline/show.html.twig', [
            'discipline' => $discipline,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_discipline_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Discipline $discipline, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DisciplineType::class, $discipline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', message: 'La discipline a bien été modifiée !');
            return $this->redirectToRoute('app_discipline_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('discipline/edit.html.twig', [
            'discipline' => $discipline,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_discipline_delete', methods: ['POST'])]
    public function delete(Request $request, Discipline $discipline, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $discipline->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($discipline);
            $entityManager->flush();

            $this->addFlash('success', message: 'La discipline a bien été supprimée !');
        }

        return $this->redirectToRoute('app_discipline_index', [], Response::HTTP_SEE_OTHER);
    }
}
