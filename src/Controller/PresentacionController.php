<?php

namespace App\Controller;

use App\Entity\Presentacion;
use App\Form\PresentacionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/presentacion')]
class PresentacionController extends AbstractController
{
    #[Route('/', name: 'app_presentacion_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $presentacions = $entityManager
            ->getRepository(Presentacion::class)
            ->findAll();

        return $this->render('presentacion/index.html.twig', [
            'presentacions' => $presentacions,
        ]);
    }

    #[Route('/new', name: 'app_presentacion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $presentacion = new Presentacion();
        $form = $this->createForm(PresentacionType::class, $presentacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($presentacion);
            $entityManager->flush();

            return $this->redirectToRoute('app_presentacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('presentacion/new.html.twig', [
            'presentacion' => $presentacion,
            'form' => $form,
        ]);
    }

    #[Route('/{idPresentacion}', name: 'app_presentacion_show', methods: ['GET'])]
    public function show(Presentacion $presentacion): Response
    {
        return $this->render('presentacion/show.html.twig', [
            'presentacion' => $presentacion,
        ]);
    }

    #[Route('/{idPresentacion}/edit', name: 'app_presentacion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Presentacion $presentacion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PresentacionType::class, $presentacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_presentacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('presentacion/edit.html.twig', [
            'presentacion' => $presentacion,
            'form' => $form,
        ]);
    }

    #[Route('/{idPresentacion}', name: 'app_presentacion_delete', methods: ['POST'])]
    public function delete(Request $request, Presentacion $presentacion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$presentacion->getIdPresentacion(), $request->request->get('_token'))) {
            $entityManager->remove($presentacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_presentacion_index', [], Response::HTTP_SEE_OTHER);
    }
}
