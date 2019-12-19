<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProvidersController extends AbstractController
{
    /**
     * @Route("/providers", name="providers")
     */
    public function index()
    {
        return $this->render('providers/index.html.twig', [
            'controller_name' => 'ProvidersController',
        ]);
    }
}
