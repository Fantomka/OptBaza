<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Provider;
use App\Entity\Supply;
use App\Entity\Unit;
use App\Repository\PriceRepository;
use App\Repository\ProductRepository;
use App\Repository\ProviderRepository;
use App\Repository\SupplyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\{SerializationContext, SerializerInterface};


class ObjectController extends AbstractController
{
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @Route("/object", name="object")
     */
    public function index()
    {
        return $this->render('object/index.html.twig', [
            'controller_name' => 'ObjectController',
        ]);
    }

    /**
     * @Route("/object/provider",name="providors",
     * methods={"GET"})
     */
    public function getProviders(ProviderRepository $provider, ProductRepository $product, SupplyRepository $supply)
    {
        $data = [];
        $providers = $provider->findAll();
        $supplys = $supply->findAll();
        $products = $product->findAll();
        foreach ($products as $product) {
            $pa[] = $product->getProductName();
        }
        foreach ($supplys as $key) {
            if (count($key->getProducts()) === count($pa)) {
                $data[] = $key->getProvider()->getFullName();
            }
//            $data = $key->getProducts();
        }
        return new JsonResponse($data);
    }

    /**
     * @Route("/object/lower", name="get_lover_cost",
     *     methods={"GET"})
     */
    public function getLowerCost(PriceRepository $priceRepository, ProviderRepository $providerRepository)
    {
        $target = $priceRepository->findBy(['Product' => '1']);
        $data = [];
        $dates =[];
        $providers = $priceRepository->findAll();
        foreach ($target as $t){
            foreach ($providers as $provider){
                if ($t->getProvider()->getId() === $provider->getId()){
                    $dates[$provider->getId()][] = $t->getPriceOfUnit();
                }
            }
        }
        return new JsonResponse($dates);
    }
}
