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
    public function index(TypeRepository $repo)
    {
        $types = $repo -> findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            "types" => $types
        ]);
    }
    
    /**
     * @Route("/admin/type/{id}", name="modif_type")
     */
    public function modifierType(Type $type)
    {
        $form = $this -> createForm(TypeType::class);
        return $this->render('admin/admin_type/modifEtAjout_type.html.twig', [
            "type" => $type
        ]);
    }
}
