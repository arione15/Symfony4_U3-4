<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(UtilisateurRepository $repo, EntityManagerInterface $em ): Response
    {
        $utilsateur = new Utilisateur();
        $req = $repo -> findAll();
        $form = $this->createForm(InscriptionType::class, $utilisateur );

        return $this->render('admin_secu/inscription.html.twig', [
            
        ]);
    }
}
