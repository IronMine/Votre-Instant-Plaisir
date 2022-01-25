<?php

namespace App\Controller;

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
     * @Route("/", name="")
     */
    public function index(): Response
    {
        return $this->render('riorges/index.html.twig', [
            'controller_name' => 'RiorgesController',
        ]);
    }
}
