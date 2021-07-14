<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{

     * @Route("/", name="aliments")
     */
    public function index(): Response
    {
        return $this->render('aliment/aliments.html.twig');
    }

    * @Route("/aliments", name="afficher_aliments")
     */
    public function afficherAliments(): Response
    {
        return $this->render('aliment/afficher_aliments.html.twig');
    }
}
