<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request, EntityManagerInterface $om, )
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class,$utilisateur);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $om->persist($utilisateur);
            $om->flush();
            return $this->redirectToRoute("aliments");
        }

        return $this->render('admin_secu/inscription.html.twig',[
            "form" => $form->createView()
        ]);
    }
}
