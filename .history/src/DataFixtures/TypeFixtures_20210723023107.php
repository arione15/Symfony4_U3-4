<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Aliment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $t1 = new Type();
        $t1->setLibelle("Fruits")
            ->setImage("fruits.jpg")
            ->setCreatedAt//             ->setUpdatedAt(new DateTime('now'))
;
        $manager->persist($t1);
        $t2 = new Type();
        $t2->setLibelle("Legumes")
            ->setImage("legumes.jpg")
            ->setCreatedAt//             ->setUpdatedAt(new DateTime('now'))
;
        $manager->persist($t2);

        $alimentRepository = $manager->getRepository(Aliment::class);

        $a1 = $alimentRepository->findOneBy(["nom" => "Patate"]);
        //var_dump($a1);
        $a1->setType($t2);
        $manager->persist($a1);

        $a2 = $alimentRepository->findOneBy(["nom" => "Tomate"]);
        $a2->setType($t2);
        $manager->persist($a2);

        $a3 = $alimentRepository->findOneBy(["nom" => "Pomme"]);
        $a3->setType($t1);
        $manager->persist($a3);

        $manager->flush();
    }
}
