<?php

namespace App\Controller;

use App\Entity\Items;
use App\Form\ItemsType;
use App\Repository\ItemsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/items")
 */
class ItemsController extends AbstractController
{
    /**
     * @Route("/", name="items_index", methods={"GET"})
     */
    public function index(ItemsRepository $itemsRepository): Response
    {
        if ($this->isGranted('ROLE_RIORGES')) {
            $items = $itemsRepository->findBy(['franchise' => 1]);
         }   


        return $this->render('items/index.html.twig', [
            'items' => $items,
        ]);
    }

    /**
     * @Route("/new", name="items_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $item = new Items();
        $form = $this->createForm(ItemsType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($item);
            $entityManager->flush();

            return $this->redirectToRoute('items_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('items/new.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="items_show", methods={"GET"})
     */
    public function show(Items $item): Response
    {
        return $this->render('items/show.html.twig', [
            'item' => $item,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="items_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Items $item, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ItemsType::class, $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('items_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('items/edit.html.twig', [
            'item' => $item,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="items_delete", methods={"POST"})
     */
    public function delete(Request $request, Items $item, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$item->getId(), $request->request->get('_token'))) {
            $entityManager->remove($item);
            $entityManager->flush();
        }

        return $this->redirectToRoute('items_index', [], Response::HTTP_SEE_OTHER);
    }
}
