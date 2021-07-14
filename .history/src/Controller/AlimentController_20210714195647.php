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
            "aliments" => $aliments
        ]);
    }

    /**
     * @Route("/aliments/{calorie}", name="alimentParCalorie")
     */
    public function aliments(AlimentRepository $repository)
    {
        $aliments = $repository -> getAlimentsByCalorie($calorie);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments
        ]);
    }
}
