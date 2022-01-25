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
     * @Route("", name="")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
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
     * @Route("/mentions-legales", name="Mentions légales")
     */
    public function indexMentions(): Response
    {
        return $this->render('main/mentions-legales.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

}
