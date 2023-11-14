<?php

namespace App\DataFixtures;

use App\Entity\Annonce;
use App\Entity\Utilisateur;
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
        
        // Les Utilisateurs factices
        $fichierUtilisateurCsv = fopen(__DIR__ . "/utilisateur.csv", "r");
        while (!feof($fichierUtilisateurCsv)) {
            $lesUtilisateurs[] = fgetcsv($fichierUtilisateurCsv);
        }
        fclose($fichierUtilisateurCsv);
        foreach ($lesUtilisateurs as $value) {
            if (is_array($value) && count($value) >= 6) {
                $utilisateur = new Utilisateur();
                $dateN = \DateTime::createFromFormat('d/m/Y', $value[3] ?? '');
                $utilisateur->setId(intval($value[0] ?? 0))
                    ->setPrenom($value[1] ?? '')
                    ->setNom($value[2] ?? '')
                    ->setDateN($dateN)
                    ->setCp($value[4] ?? '')
                    ->setImage(getRandomUnsplashImageUrl("africain"))
                    ->setMail($value[5] ?? '')
                    ->setPassword($value[6] ?? '');
                    $this->addReference("utilisateur".intval($value[0]),$utilisateur);
        
                $manager->persist($utilisateur);
            }
        }

        // // Les annonces factices
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
                    ->setVille($value[3] ?? '')
                    ->setDescription(substr($value[4] ?? '', 0, 500))
                    ->setImage(getRandomUnsplashImageUrl("appartements"))
                    ->setCp(substr($value[5] ?? '', 0, 10))
                    ->setSuperficie($value[6] ?? '')
                    ->setNbPiece($value[7] ?? '')
                    ->setType($value[8] ?? '')
                    ->setPrix(intval($value[9] ?? 0))
                    ->setUtilisateurs($this->getReference('utilisateur' . $value[0]));

                $manager->persist($annonce);
            }
        }


        $manager->flush();
    }
}
