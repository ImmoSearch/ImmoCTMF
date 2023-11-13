<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // Les images avec unsplash
        function getRandomUnsplashImageUrl($category) {
            $query = urlencode($category);
            $unsplashUrl = "https://source.unsplash.com/random?{$query}";
            return $unsplashUrl;
        }

        // Les annonces factices
        $fichierAnnonceCsv = fopen(__DIR__ . "/annonce.csv", "r");
        while (!feof($fichierAnnonceCsv)) {
            $lesAnnonces[] = fgetcsv($fichierAnnonceCsv);
        }
        fclose($fichierAnnonceCsv);
        foreach ($lesAnnonces as $value) {
            if (is_array($value) && count($value) >= 6) {
                $annonce = new Annonce();
                $annonce->setId(intval($value[0] ?? 0))
                    ->setOrganisme($value[1] ?? '')
                    ->setNom($value[2] ?? '')
                    ->setVille($value[3] ?? '')
                    ->setDescription(substr($value[4] ?? '', 0, 500))
                    ->setImage(getRandomUnsplashImageUrl("appartements"))
                    ->setCp(substr($value[5] ?? '', 0, 10))
                    ->setSuperficie($value[6] ?? '')
                    ->setNbPiece($value[7] ?? '')
                    ->setType($value[8] ?? '')
                    ->setPrix(intval($value[9] ?? 0));

                $manager->persist($annonce);
            }
        }
        

        $manager->flush();
    }
}
