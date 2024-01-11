<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240109213612 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Désactiver la clé étrangère de la table 'livre'
        $this->addSql('SET foreign_key_checks = 0;');
        
        // Supprimer la table 'livre'
        $this->addSql('DROP TABLE livre');
        
        // Activer à nouveau les clés étrangères
        $this->addSql('SET foreign_key_checks = 1;');
        
        // Supprimer les autres tables
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE pret');
    }

    public function down(Schema $schema): void
    {
        // Recréer les tables dans l'ordre inverse
        $this->addSql('CREATE TABLE adherent (...)');
        $this->addSql('CREATE TABLE auteur (...)');
        $this->addSql('CREATE TABLE genre (...)');
        
        // Recréer la table 'livre'
        $this->addSql('CREATE TABLE livre (...)');
        
        // Ajouter la clé étrangère de la table 'livre'
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT livre_fk_1 FOREIGN KEY (nomColonne) REFERENCES autreTable (nomColonne)');
        
        $this->addSql('CREATE TABLE pret (...)');
    }
}
