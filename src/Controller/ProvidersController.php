<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\ProviderRepository;
use App\Repository\UnitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProvidersController extends AbstractController
{
    /**
     * @Route("/providers", name="providers", methods={"GET"})
     */
    public function index()
    {
        return $this->render('providers/index.html.twig', [
            'controller_name' => 'ProvidersController',
        ]);
    }

    /**
     * @Route("/providers/all", name="get_products")
     */
    public function getProducts(ProviderRepository $productRepository){
        $products = $productRepository->findAll();
        foreach ($products as $product){
            $data['name'][] = $product->getFullName();
            $data['address'][] = $product->getAddress();
            $data['telephone'][] = $product->getTelephone();
        }
        return new JsonResponse($data);
    }
}
