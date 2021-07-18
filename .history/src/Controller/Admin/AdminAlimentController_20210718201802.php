<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $respository)
    {
        $aliments = $respository->findAll();
        return $this->render('admin/admin_aliment/adminAliment.html.twig',[
            "aliments" => $aliments
        ]);
    }

    /**
     * @Route("/admin/aliment/creation", name="admin_aliment_creation")
     * @Route("/admin/aliment/{id}", name="admin_aliment_modification")
     */
    public function ajoutEtModif(Aliment $aliment = null, Request $request, EntityManagerInterface $entityManager)
    {
        if(!$aliment) {
            $aliment = new Aliment();
        }

        $form = $this->createForm(AlimentType::class,$aliment);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($aliment);
            $objectManager->flush();
            return $this->redirectToRoute("admin_aliment");
        }

        return $this->render('admin/admin_aliment/modifEtAjout.html.twig',[
            "aliment" => $aliment,
            "form" => $form->createView(),
            "isModification" => $aliment->getId() !== null
        ]);
    }
}
