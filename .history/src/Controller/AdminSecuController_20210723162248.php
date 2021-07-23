<?php

namespace App\Controller;

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
        $form = $this->
        return $this->render('admin_secu/inscription.html.twig', [
            
        ]);
    }
}
