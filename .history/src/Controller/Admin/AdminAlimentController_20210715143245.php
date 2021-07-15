<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Repository\AlimentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminAlimentController extends AbstractController
{
    /**
     * @Route("/admin/aliment", name="admin_aliment")
     */
    public function index(AlimentRepository $repository)
    {
        $aliments = $repository -> findAll();
        return $this->render('admin/admin_aliment/adminAliment.html.twig', [
            'aliments' => $aliments
        ]);
    }
    /**
     * @Route("/admin/aliment/{id}", name="admin_aliment_modification")
     */
    public function modifierAliment(Aliment $aliment)
    {
        $this -> creatForm($form)
        return $this->render('admin/admin_aliment/modificationAliment.html.twig', [
            'aliment' => $aliment
        ]);
    }
}
