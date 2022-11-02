<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', 'index', methods: ['GET'])]
    public function index(LoggerInterface $dbLogger): Response
    {
        $dbLogger->info('this is a test');
        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
