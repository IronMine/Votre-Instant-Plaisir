<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/** 
 * @Route("/", name="main_")
 * @package App\Controller
 */

class MainController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/events", name="events")
     */
    public function indexEvents(): Response
    {
        return $this->render('main/events.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/politique-de-confidentialite", name="confidentialite")
     */
    public function indexConfidentialité(): Response
    {
        return $this->render('main/confidentialite.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/mentions-legales", name="mentions_legales")
     */
    public function indexMentions(): Response
    {
        return $this->render('main/mentions-legales.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function indexContact(): Response
    {
        return $this->render('main/contact.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
