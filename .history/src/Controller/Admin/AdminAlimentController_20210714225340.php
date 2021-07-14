<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/admin/aliment", name="admin_admin_aliment")
     */
    public function index(): Response
    {
        return $this->render('admin/admin_aliment/index.html.twig', [
            'controller_name' => 'AdminAlimentController',
        ]);
    }
}
