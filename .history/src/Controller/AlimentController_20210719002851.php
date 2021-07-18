<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlimentController extends AbstractController
{
    /**
     * @Route("/", name="aliments")
     */
    public function index(AlimentRepository $repository)
    {
<<<<<<< HEAD
        $aliments = $repository -> findAll();
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie" => false,
            "isGlucide" => false
=======
        $aliments = $repository->findAll();
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => false
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
        ]);
    }

    /**
<<<<<<< HEAD
     * @Route("/aliments/calorie/{calorie}", name="alimentParCalorie")
     */
    public function alimentsMoinsCalorique(AlimentRepository $repository, $calorie)
    {
        $aliments = $repository -> getAlimentsByProperty('calories', '<', $calorie);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie" => true,
            "isGlucide" => false
        ]);
    }
    /**
     * @Route("/aliments/glucide/{glucide}", name="alimentsParGlucides")
     */
    public function alimentsMoinsGlicimique(AlimentRepository $repository, $glucide)
    {
        $aliments = $repository -> getAlimentsByProperty('glucides', '<', $glucide);
        return $this->render('aliment/aliments.html.twig', [
            "aliments" => $aliments,
            "isCalorie" => false,
            "isGlucide" => true
=======
     * @Route("/aliments/calorie/{calorie}", name="alimentsParCalorie")
     */
    public function alimentsMoinsCaloriques(AlimentRepository $repository,$calorie)
    {
        $aliments = $repository->getAlimentParPropriete('calorie','<',$calorie);
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => true,
            'isGlucide' => false
        ]);
    }

    /**
     * @Route("/aliments/glucide/{glucide}", name="alimentsParGlucides")
     */
    public function alimentsAvecMoinsGlucides(AlimentRepository $repository,$glucide)
    {
        $aliments = $repository->getAlimentParPropriete('glucide','<',$glucide);
        return $this->render('aliment/aliments.html.twig', [
            'aliments' => $aliments,
            'isCalorie' => false,
            'isGlucide' => true
>>>>>>> c5050d72164580e51734290ade01c3fe13ed8581
        ]);
    }
}
