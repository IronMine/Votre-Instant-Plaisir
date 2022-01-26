<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/** 
 * @Route("/genilac", name="genilac_")
 * @package App\Controller
 */
class GenilacController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('genilac/index.html.twig', [
            'controller_name' => 'GenilacController',
        ]);
    }
}
