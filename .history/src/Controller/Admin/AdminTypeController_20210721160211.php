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
     * @Route("/admin/type/{id}", name="modifType", methods"POST|GET")
     * @Route("/admin/type/create", name="ajoutType")
     */
    public function ajouEtModif(Type $type = null, Request $request, EntityManagerInterface $manager) // $type peut être nul dans le cas de la création. Dans ce cas il faut instancier Type pour pouvoir créer un formulaire qui sera vide du coup
    {
        if(!$type){
            $type = new Type();
        }
        $form = $this -> createForm(TypeType::class, $type);
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid()){
            $modif = $type -> getId() !== null;
            $manager -> persist($type);
            $manager -> flush();
            $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectuée");
            return $this -> redirectToRoute('admin_types');
        }
        return $this->render('admin/admin_type/modifEtAjout_type.html.twig', [
            "type" => $type,
            "form" => $form -> createView(),
            "isModification" => $type->getId() !== null
        ]);
    }

    /**
     */
    public function supprimerType(Type $type, Request $request, EntityManagerInterface $manager) // $type peut être nul dans le cas de la création. Dans ce cas il faut instancier Type pour pouvoir créer un formulaire qui sera vide du coup
    {
        $form = $this -> createForm(TypeType::class, $type);
        $form -> handleRequest($request);
        if($form -> isSubmitted() && $form -> isValid()){
            $modif = $type -> getId() !== null;
            $manager -> persist($type);
            $manager -> flush();
            $this->addFlash("success", ($modif) ? "La modification a été effectuée" : "L'ajout a été effectuée");
            return $this -> redirectToRoute('admin_types');
        }
        return $this->render('admin/admin_type/modifEtAjout_type.html.twig', [
            "type" => $type,
            "form" => $form -> createView(),
            "isModification" => $type->getId() !== null
        ]);
    }

    /**
     * @Route("/admin/type/{id}", name="supType", methods="delete")
     */
    public function suppression(Aliment $aliment, Request $request, EntityManagerInterface $entityManager){
        if($this->isCsrfTokenValid("SUP". $aliment->getId(),$request->get('_token'))){
            $entityManager->remove($aliment);
            $entityManager->flush();
            $this->addFlash("success","La suppression a été effectuée");
            return $this->redirectToRoute("admin_aliment");
        }
    }




}
