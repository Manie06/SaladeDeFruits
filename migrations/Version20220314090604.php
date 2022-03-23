<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220314090604 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur_activite_name (utilisateur_id INT NOT NULL, activite_name_id INT NOT NULL, INDEX IDX_D2E36F6FB88E14F (utilisateur_id), INDEX IDX_D2E36F63BB15B53 (activite_name_id), PRIMARY KEY(utilisateur_id, activite_name_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_activite_name ADD CONSTRAINT FK_D2E36F6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_activite_name ADD CONSTRAINT FK_D2E36F63BB15B53 FOREIGN KEY (activite_name_id) REFERENCES activite_name (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activites ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activites ADD CONSTRAINT FK_766B5EB5FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_766B5EB5FB88E14F ON activites (utilisateur_id)');
        $this->addSql('ALTER TABLE avis ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF0FB88E14F ON avis (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateur ADD civilite_id INT DEFAULT NULL, ADD fiche_renseignement_id INT DEFAULT NULL, ADD questionnaire_de_vie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B339194ABF FOREIGN KEY (civilite_id) REFERENCES civilite (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B38D54A9D FOREIGN KEY (fiche_renseignement_id) REFERENCES fiche_renseignements (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3E526D7E0 FOREIGN KEY (questionnaire_de_vie_id) REFERENCES questionnaire_de_vie (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B339194ABF ON utilisateur (civilite_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B38D54A9D ON utilisateur (fiche_renseignement_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3E526D7E0 ON utilisateur (questionnaire_de_vie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utilisateur_activite_name');
        $this->addSql('ALTER TABLE activites DROP FOREIGN KEY FK_766B5EB5FB88E14F');
        $this->addSql('DROP INDEX IDX_766B5EB5FB88E14F ON activites');
        $this->addSql('ALTER TABLE activites DROP utilisateur_id');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0FB88E14F');
        $this->addSql('DROP INDEX IDX_8F91ABF0FB88E14F ON avis');
        $this->addSql('ALTER TABLE avis DROP utilisateur_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B339194ABF');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B38D54A9D');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3E526D7E0');
        $this->addSql('DROP INDEX IDX_1D1C63B339194ABF ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B38D54A9D ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B3E526D7E0 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP civilite_id, DROP fiche_renseignement_id, DROP questionnaire_de_vie_id');
    }
}
