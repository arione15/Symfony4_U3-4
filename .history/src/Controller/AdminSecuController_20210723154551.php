<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/inscription", name="admin_secu")
     */
    public function index(): Response
    {
        return $this->render('admin_secu/index.html.twig', [
            'controller_name' => 'AdminSecuController',
        ]);
    }
}
