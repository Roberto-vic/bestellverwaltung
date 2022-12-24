<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]

class ProductController extends AbstractController
{
    #[Route('/product/add/{companyId}', name: 'product_add')]
    public function add(int $companyId, Request $request, EntityManagerInterface $entityManager): Response
    {
        $company = $entityManager->getRepository(Company::class)->find($companyId);
        if(!$company instanceof Company){
            throw new EntityNotFoundException('Firma wurde nicht gefunden!!');
        }

        $product = new Product();
        $form = $this->createForm(ProductType::class, $product, ['company'=> $company]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $product->setCompany($company);
            $entityManager->persist($product);
            $entityManager->flush();
            $this->addFlash('success', 'Das Produkt wurde erfolgreich hinzugefügt!');
            return $this->redirectToRoute('admin_user_list');
        }

        return $this->render('product/add.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }
}
