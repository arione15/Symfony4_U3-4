<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
     */
    public function index(): Response
    {
        return $this->render('aliment/aliments.html.twig');
    }

    /**
    * @Route("/aliments", name="afficher_aliments")
     */
    public function afficherAliments(AlimentRepository $repository): Response
    {
        $aliments = $repository -> findAll()
        return $this->render('aliment/afficher_aliments.html.twig',
        });
    }
}
