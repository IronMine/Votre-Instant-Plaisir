<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use App\Repository\ItemsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/** 
 * @Route("/riorges", name="riorges_")
 * @package App\Controller
 */


class RiorgesController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('riorges/index.html.twig', [
            'controller_name' => 'RiorgesController',
        ]);
    }

/**
     * @Route("/cave", name="cave")
     */
    public function indexCave(ItemsRepository $itemsRepository, CategoriesRepository $categoriesRepository): Response
    {
        $categories = $categoriesRepository->findBy(['franchise' => 1,'type'=> 1]);
            $items = $itemsRepository->findBy(['franchise' => 1,'type'=> 1]);
        
        return $this->render('riorges/cave.html.twig', [
            'controller_name' => 'CaveRiorgesController',
            'items' => $items,
            'categories' => $categories,
        ]);
    }

      /**
     * @Route("/events", name="events")
     */
    public function events(): Response
    {
        return $this->render('riorges/events.html.twig', [
            'controller_name' => 'RiorgesController',
        ]);
    }

      /**
     * @Route("/bar", name="bar")
     */
    public function bar(): Response
    {
        return $this->render('riorges/bar.html.twig', [
            'controller_name' => 'RiorgesController',
        ]);
    }

      /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('riorges/contact.html.twig', [
            'controller_name' => 'RiorgesController',
        ]);
    }
}
