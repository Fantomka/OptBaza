<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\UnitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/home", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/home/products", name="get_products",methods={"GET"})
     */
    public function getProducts(ProductRepository $productRepository, UnitRepository $unitRepository){
        $products = $productRepository->findAll();
        $data = [];
        foreach ($products as $product){
            $data['name'][] = $product->getProductName();
            $data['cost'][] = $product->getUnitCost();
            $data['unit'][] = $product->getUnit()->getUnit();
        }
        return new JsonResponse($data);
    }
}
