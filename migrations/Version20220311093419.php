<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311093419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD activites_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF05B8C31B7 FOREIGN KEY (activites_id) REFERENCES activites (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF05B8C31B7 ON avis (activites_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF05B8C31B7');
        $this->addSql('DROP INDEX IDX_8F91ABF05B8C31B7 ON avis');
        $this->addSql('ALTER TABLE avis DROP activites_id');
    }
}
