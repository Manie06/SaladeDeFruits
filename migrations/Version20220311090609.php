<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311090609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE questionnaire_de_vie ADD handicap_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE questionnaire_de_vie ADD CONSTRAINT FK_A02655C4616050E FOREIGN KEY (handicap_name_id) REFERENCES handicap_name (id)');
        $this->addSql('CREATE INDEX IDX_A02655C4616050E ON questionnaire_de_vie (handicap_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE questionnaire_de_vie DROP FOREIGN KEY FK_A02655C4616050E');
        $this->addSql('DROP INDEX IDX_A02655C4616050E ON questionnaire_de_vie');
        $this->addSql('ALTER TABLE questionnaire_de_vie DROP handicap_name_id');
    }
}
