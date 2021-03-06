<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Entity\Images;
use App\Entity\Type;
use App\Form\CategoriesType;
use App\Repository\CategoriesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/categories")
 */
class CategoriesController extends AbstractController
{
    /**
     * @Route("/", name="categories_index", methods={"GET"})
     */
    public function index(CategoriesRepository $categoriesRepository): Response
    {
        if ($this->isGranted('ROLE_ADMIN_RIORGES')) {
            $categories = $categoriesRepository->findBy(['franchise' => 1]);
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            $categories = $categoriesRepository->findAll();
        }

        return $this->render('categories/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/new", name="categories_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Categories();

        // $type = $entityManager->getRepository(Type::class)->findAll();

        $form = $this->createForm(CategoriesType::class, $category);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {


            $images = $form->get('image')->getData();
            // $images = $form->getData()->getImage()->getFile();

            // dd($images);

            $fichier = md5(uniqid()) . '.' . $images->guessExtension();

            $images->move(
                $this->getParameter('images_directory'),
                $fichier
            );

            $img = new Images();
            $img->setName($fichier);


            $entityManager->persist($img);

            $entityManager->flush();

            $category->setImage($img);


            $entityManager->persist($category);

            $entityManager->flush();

            return $this->redirectToRoute('categories_index', [], Response::HTTP_SEE_OTHER);
        }


        return $this->render('categories/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
            // 'type' => $type,
        ]);
    }

    /**
     * @Route("/{id}", name="categories_show", methods={"GET"})
     */
    public function show(Categories $category): Response
    {
        return $this->render('categories/show.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categories_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Categories $category, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoriesType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('categories_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categories/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="categories_delete", methods={"POST"})
     */
    public function delete(Request $request, Categories $category, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $category->getId(), $request->request->get('_token'))) {
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('categories_index', [], Response::HTTP_SEE_OTHER);
    }
}
