<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliment")
     */
    public function index(): Response
    {
        return $this->render('aliment/index.html.twig', [
            'controller_name' => 'AlimentController',
        ]);
    }
}
