<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310163943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites ADD utilisateurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activites ADD CONSTRAINT FK_766B5EB51E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_766B5EB51E969C5 ON activites (utilisateurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites DROP FOREIGN KEY FK_766B5EB51E969C5');
        $this->addSql('DROP INDEX IDX_766B5EB51E969C5 ON activites');
        $this->addSql('ALTER TABLE activites DROP utilisateurs_id');
    }
}
