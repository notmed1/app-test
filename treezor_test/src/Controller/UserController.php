<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    /**
     * This function display all users
     *
     * @param UserRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/user', name: 'user', methods: ['GET'])]
    public function index(UserRepository $repository, PaginatorInterface $paginator, Request $request): Response
    {
        $users = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('pages/user/index.html.twig', [
            'controller_name' => 'UserController',
            'users' => $users

        ]);
    }
}
