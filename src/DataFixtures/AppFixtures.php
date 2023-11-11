<?php

namespace App\DataFixtures;

use App\Entity\Bien;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\UtilisateurRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fichierBienCsv=fopen(__DIR__."/bien.csv","r");
        while (!feof($fichierBienCsv)) {
            $lesBiens[]=fgetcsv($fichierBienCsv);
        }
        fclose($fichierBienCsv);

        foreach ($lesBiens as $value) {
            $bien = new Bien();
            $bien ->setId()
        }
        $manager->flush();
    }
}
