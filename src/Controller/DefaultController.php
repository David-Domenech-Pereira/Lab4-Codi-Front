<?php

namespace App\Controller;

use Sce\PracticaVendorTest\DTO\Requests\CarQuery\CarQueryRequestDTO;
use Sce\PracticaVendorTest\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function __construct(
        private readonly CarRepository $carRepository
    )
    {

    }

    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        $carQueryRequestDTO = new CarQueryRequestDTO();
        $carQueryRequestDTO->setId(1);

        $response = $this->carRepository->query($carQueryRequestDTO);

        $car = $response->getData();

        return new Response('Car name: ' . $car->getName());
    }
}