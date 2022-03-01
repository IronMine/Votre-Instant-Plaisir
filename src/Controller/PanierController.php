<?php

namespace App\Controller;

use App\Repository\ItemsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="panier")
     */
    public function index(SessionInterface $session, ItemsRepository $itemsRepository): Response
    {
        $panier = $session->get('panier', []);

        $panierwithData = [];

        foreach ($panier as $id => $quantity) {
            $panierwithData[] = [
                'product' => $itemsRepository->find($id),
                'quantity' => $quantity
            ];
        }


        // dd($panierwithData);


        $total = 0;
        foreach ($panierwithData as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }


        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'items' => $panierwithData,
            'total' => $total
        ]);
    }
    /** 
     * @Route("/panier/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session,Request $request)
    {
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);

        return $this->redirect($request->headers->get('referer'));
    }
}
