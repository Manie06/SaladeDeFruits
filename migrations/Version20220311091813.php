<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311091813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites ADD moyen_transport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activites ADD CONSTRAINT FK_766B5EB53ED8D53F FOREIGN KEY (moyen_transport_id) REFERENCES moyen_transport (id)');
        $this->addSql('CREATE INDEX IDX_766B5EB53ED8D53F ON activites (moyen_transport_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites DROP FOREIGN KEY FK_766B5EB53ED8D53F');
        $this->addSql('DROP INDEX IDX_766B5EB53ED8D53F ON activites');
        $this->addSql('ALTER TABLE activites DROP moyen_transport_id');
    }
}
