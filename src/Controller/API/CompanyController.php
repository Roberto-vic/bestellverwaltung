<?php

declare(strict_types=1);

namespace App\Controller\API;

use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class CompanyController extends AbstractController
{
    /**
     * Class constructor.
     */
    public function __construct(private CompanyRepository $companyRepository)
    {
        
    }

    #[Route('/companies', name: 'api_companies')]

    public function readAll(SerializerInterface $serializer): Response
    {
        $companies = $this->companyRepository->findAll();
        $responseData = $serializer->serialize($companies, 'json', ['groups' => ['company']]);

        return $this->json($responseData);
    }
}
