<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    /**
     * @Route("/types", name="types")
     */
    public function index(EntityManagerInterface $repo): Response
    {
        return $this->render('type/types.html.twig', [
            'lesTypes' => $types
        ]);
    }
}
