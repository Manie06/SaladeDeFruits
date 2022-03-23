<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220314085713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD date_de_naissance DATETIME DEFAULT NULL, ADD adresse1 VARCHAR(255) DEFAULT NULL, ADD adresse2 VARCHAR(255) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD code_postal VARCHAR(255) DEFAULT NULL, ADD numero_de_securite_sociale VARCHAR(255) DEFAULT NULL, ADD numero_de_telephone VARCHAR(255) DEFAULT NULL, ADD date_inscription DATETIME DEFAULT NULL, ADD biographie LONGTEXT DEFAULT NULL, ADD activite_preferee VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP nom, DROP prenom, DROP date_de_naissance, DROP adresse1, DROP adresse2, DROP ville, DROP code_postal, DROP numero_de_securite_sociale, DROP numero_de_telephone, DROP date_inscription, DROP biographie, DROP activite_preferee');
    }
}
