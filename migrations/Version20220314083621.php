<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220314083621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EA832C1C9');
        $this->addSql('ALTER TABLE activites DROP FOREIGN KEY FK_766B5EB51E969C5');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF01E969C5');
        $this->addSql('ALTER TABLE utilisateurs_activite_name DROP FOREIGN KEY FK_48018F7D1E969C5');
        $this->addSql('DROP TABLE connexion');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE utilisateurs_activite_name');
        $this->addSql('DROP INDEX IDX_766B5EB51E969C5 ON activites');
        $this->addSql('ALTER TABLE activites DROP utilisateurs_id');
        $this->addSql('DROP INDEX IDX_8F91ABF01E969C5 ON avis');
        $this->addSql('ALTER TABLE avis DROP utilisateurs_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE connexion (id INT AUTO_INCREMENT NOT NULL, mot_de_passe VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, civilite_id INT DEFAULT NULL, qualite_id INT DEFAULT NULL, fiche_renseignement_id INT DEFAULT NULL, questionnaire_de_vie_id INT DEFAULT NULL, email_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_de_naissance DATETIME DEFAULT NULL, adresse1 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, adresse2 VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ville VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, code_postal VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, numero_de_securite_sociale VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, numero_de_telephone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, date_inscription DATETIME DEFAULT NULL, biographie LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, activite_preferee VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_497B315EA6338570 (qualite_id), INDEX IDX_497B315E8D54A9D (fiche_renseignement_id), UNIQUE INDEX UNIQ_497B315EA832C1C9 (email_id), INDEX IDX_497B315E39194ABF (civilite_id), INDEX IDX_497B315EE526D7E0 (questionnaire_de_vie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateurs_activite_name (utilisateurs_id INT NOT NULL, activite_name_id INT NOT NULL, INDEX IDX_48018F7D1E969C5 (utilisateurs_id), INDEX IDX_48018F7D3BB15B53 (activite_name_id), PRIMARY KEY(utilisateurs_id, activite_name_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E39194ABF FOREIGN KEY (civilite_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EA6338570 FOREIGN KEY (qualite_id) REFERENCES qualite (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EE526D7E0 FOREIGN KEY (questionnaire_de_vie_id) REFERENCES questionnaire_de_vie (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E8D54A9D FOREIGN KEY (fiche_renseignement_id) REFERENCES fiche_renseignements (id)');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EA832C1C9 FOREIGN KEY (email_id) REFERENCES connexion (id)');
        $this->addSql('ALTER TABLE utilisateurs_activite_name ADD CONSTRAINT FK_48018F7D1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateurs_activite_name ADD CONSTRAINT FK_48018F7D3BB15B53 FOREIGN KEY (activite_name_id) REFERENCES activite_name (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activites ADD utilisateurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activites ADD CONSTRAINT FK_766B5EB51E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_766B5EB51E969C5 ON activites (utilisateurs_id)');
        $this->addSql('ALTER TABLE avis ADD utilisateurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF01E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF01E969C5 ON avis (utilisateurs_id)');
    }
}
