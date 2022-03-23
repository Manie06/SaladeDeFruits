<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311090036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs ADD questionnaire_de_vie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EE526D7E0 FOREIGN KEY (questionnaire_de_vie_id) REFERENCES questionnaire_de_vie (id)');
        $this->addSql('CREATE INDEX IDX_497B315EE526D7E0 ON utilisateurs (questionnaire_de_vie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EE526D7E0');
        $this->addSql('DROP INDEX IDX_497B315EE526D7E0 ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs DROP questionnaire_de_vie_id');
    }
}
