<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
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
        $aliments = $repository->findAll();
        return $this->render('admin/admin_aliment/adminAliment.html.twig', [
            'aliments' => $aliments
        ]);
    }

    /**
     * @Route("/admin/aliment/creation", name="admin_aliment_creation")
     * @Route("/admin/aliment/{id}", name="admin_aliment_modification", methods="GET|POST")
     */
    public function modifierEtAjouterAliment(Aliment $aliment = null, Request $request, EntityManagerInterface $entityManager)
    {
        if(!$aliment) {
            $aliment = new Aliment();
        };
        $form = $this->createForm(AlimentType::class, $aliment);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $modif = $aliment -> getId() !== null; // si l'aliment n'existe pas, et bien qu'il ait été il est crée avec if(!$aliment) $aliment = new Aliment mais il n'est pas encore
            $entityManager->persist($aliment);
            $entityManager->flush();
            $this -> addFlash("success", ($modif) ? "La modification a été enregistrée !" : "L'ajout a été enregistrée !");
            return $this->redirectToRoute('admin_aliment');
        };

        return $this->render('admin/admin_aliment/modificationEtAjoutAliment.html.twig', [
            'aliment' => $aliment,
            'form' => $form->createView(),
            'isModification' => $aliment->getId() !== null
        ]);
    }

    /**
     * @Route("/admin/aliment/{id}", name="admin_aliment_suppression", methods="delete")
     */
    public function suppression(Aliment $aliment, Request $request, EntityManagerInterface $entityManager)
    {
        if ($this->isCsrfTokenValid("SUP" . $aliment->getId(), $request->get("_token"))) {
            $entityManager->remove($aliment);
            $entityManager->flush();
            $this -> addFlash("success", "La suppression a été effectuée !");
            return $this->redirectToRoute('admin_aliment');
        };
    }
}

// le paramètre http_method_override est sur false lorsque l'on débute un nouveau projet, vous devez passer de false a true dans le fichier config/package/framework.yaml à la ligne 5.