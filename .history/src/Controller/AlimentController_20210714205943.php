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
    public function index(AlimentRepository $repository)
    {
        $aliments = $repository -> findAll();
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie" => false
        ]);
    }

    /**
     * @Route("/aliments/{calorie}", name="alimentParCalorie")
     */
    public function alimentsMoinsCalorique(AlimentRepository $repository, $calorie)
    {
        $aliments = $repository -> getAlimentsByProperty('calories', '<', $calorie);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie" => true
        ]);
    }
    /**
     * @Route("/aliments/{glucide}", name="alimentParGlucide")
     */
    public function alimentsMoinsCalorique(AlimentRepository $repository, $glucide)
    {
        $aliments = $repository -> getAlimentsByProperty('glucides', '<', $glucide);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie" => false,
        ]);
    }
}
