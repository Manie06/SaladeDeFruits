<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310160207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite_name (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activites (id INT AUTO_INCREMENT NOT NULL, titre_activite VARCHAR(255) DEFAULT NULL, description_activite VARCHAR(255) DEFAULT NULL, adresse_depart VARCHAR(255) DEFAULT NULL, code_postal_depart VARCHAR(255) DEFAULT NULL, ville_depart VARCHAR(255) DEFAULT NULL, adresse_activite VARCHAR(255) DEFAULT NULL, code_postal_activite VARCHAR(255) DEFAULT NULL, ville_activite VARCHAR(255) DEFAULT NULL, adresse_retour VARCHAR(255) DEFAULT NULL, code_postal_retour VARCHAR(255) DEFAULT NULL, ville_retour VARCHAR(255) DEFAULT NULL, date_debut DATETIME DEFAULT NULL, horaire_debut DATETIME DEFAULT NULL, date_fin DATETIME DEFAULT NULL, horaire_fin DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE civilite (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connexion (id INT AUTO_INCREMENT NOT NULL, mot_de_passe VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_renseignements (id INT AUTO_INCREMENT NOT NULL, certification VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handicap_name (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moyen_transport (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qualite (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questionnaire_de_vie (id INT AUTO_INCREMENT NOT NULL, autres_problemes_medical VARCHAR(255) DEFAULT NULL, traitement_medical VARCHAR(255) DEFAULT NULL, heure_traitement_medical VARCHAR(255) DEFAULT NULL, allergies_graves VARCHAR(255) DEFAULT NULL, sujets_sensibles VARCHAR(255) DEFAULT NULL, nom_personne_contact VARCHAR(255) DEFAULT NULL, qualite_personne_contact VARCHAR(255) DEFAULT NULL, telephone_personne_contact VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur_activite (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE activite_name');
        $this->addSql('DROP TABLE activites');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE civilite');
        $this->addSql('DROP TABLE connexion');
        $this->addSql('DROP TABLE fiche_renseignements');
        $this->addSql('DROP TABLE handicap_name');
        $this->addSql('DROP TABLE moyen_transport');
        $this->addSql('DROP TABLE qualite');
        $this->addSql('DROP TABLE questionnaire_de_vie');
        $this->addSql('DROP TABLE secteur_activite');
    }
}
