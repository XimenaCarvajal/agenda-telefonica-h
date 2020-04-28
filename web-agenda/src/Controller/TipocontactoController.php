<?php

namespace App\Controller;

use App\Entity\Tipocontacto;
use App\Form\TipocontactoType;
use App\Repository\TipocontactoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipocontacto")
 */
class TipocontactoController extends AbstractController
{
    /**
     * @Route("/", name="tipocontacto_index", methods={"GET"})
     */
    public function index(TipocontactoRepository $tipocontactoRepository): Response
    {
        return $this->render('tipocontacto/index.html.twig', [
            'tipocontactos' => $tipocontactoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tipocontacto_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipocontacto = new Tipocontacto();
        $form = $this->createForm(TipocontactoType::class, $tipocontacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipocontacto);
            $entityManager->flush();

            return $this->redirectToRoute('tipocontacto_index');
        }

        return $this->render('tipocontacto/new.html.twig', [
            'tipocontacto' => $tipocontacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipocontacto_show", methods={"GET"})
     */
    public function show(Tipocontacto $tipocontacto): Response
    {
        return $this->render('tipocontacto/show.html.twig', [
            'tipocontacto' => $tipocontacto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipocontacto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tipocontacto $tipocontacto): Response
    {
        $form = $this->createForm(TipocontactoType::class, $tipocontacto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipocontacto_index');
        }

        return $this->render('tipocontacto/edit.html.twig', [
            'tipocontacto' => $tipocontacto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipocontacto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Tipocontacto $tipocontacto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipocontacto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipocontacto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipocontacto_index');
    }
}
