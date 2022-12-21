<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminUserController extends AbstractController
{
    #[Route('/user/add', name: 'admin_user_add')]
    public function add(Request $request, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $em): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            //Password hashen
            $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));

            //User persistieren
            $em->persist($user);

            //Dadtenbank schreiben
            $em->flush();
        }

        return $this->render('admin_user/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
