<?php

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminTypeController extends AbstractController
{
    /**
     * @Route("/admin/type", name="admin_type")
     */
    public function index($request): Response
    {
        $types = $request -> findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            "types" => $types
        ]);
    }
}
