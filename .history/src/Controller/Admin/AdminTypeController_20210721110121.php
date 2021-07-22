<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use App\Repository\TypeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminTypeController extends AbstractController
{
    /**
     * @Route("/admin/type", name="admin_type")
     */
    public function index(TypeRepository $repo): Response
    {
        $types = $repo -> findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            "types" => $types
        ]);
    }
    
    /**
     * @Route("/admin/type/{id}", name="modif_type")
     */
    public function modifierType(TypeRepository $repo, Type $type): Response
    {
        
        $types = $repo -> findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            "types" => $types
        ]);
    }
}
