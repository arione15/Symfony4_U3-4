<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminTypeController extends AbstractController
{
    /**
     * @Route("/admin/type", name="admin_types")
     */
    public function index(TypeRepository $repo)
    {
        $types = $repo -> findAll();
        return $this->render('admin/admin_type/adminType.html.twig', [
            "types" => $types
        ]);
    }
    
    /**
     * @Route("/admin/type/{id}", name="modifType")
     * @Route("/admin/type", name="admin_type_creation")
     */
    public function ajouEtModif(Type $type, Request $request, EntityManagerInterface $manager)
    {
        if()
        $form = $this -> createForm(TypeType::class, $type);
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid()){
            $manager -> persist($type);
            $manager -> flush();
            return $this -> redirectToRoute('admin_types');
        }
        return $this->render('admin/admin_type/modifEtAjout_type.html.twig', [
            "type" => $type,
            "form" => $form -> createView(),
            "isModification" => $type->getId() !== null
        ]);
    }
}
