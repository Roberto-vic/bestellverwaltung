<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminUserController extends AbstractController
{
    /**
     * Class constructor.
     */
    public function __construct(private EntityManagerInterface $em)
    {
    }

    #[Route('/user/add/', name: 'admin_user_add')]
    public function add(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            //Password hashen
            $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));

            //Role setting 
            $user->setRoles(['ROLE_USER']);

            //User persistieren
            $this->em->persist($user);

            //Dadtenbank schreiben
            $this->em->flush();

        }

        return $this->render('admin_user/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/users', name: 'admin_user_list')]
    public function list(UserRepository $userRepository): Response
    {
        return $this->render('admin_user/list.html.twig', 
        ['users' => $userRepository->findUsers(),
    ]);
    }
}
