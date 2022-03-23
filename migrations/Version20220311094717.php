<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311094717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_name ADD secteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activite_name ADD CONSTRAINT FK_29F367749F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur_activite (id)');
        $this->addSql('CREATE INDEX IDX_29F367749F7E4405 ON activite_name (secteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_name DROP FOREIGN KEY FK_29F367749F7E4405');
        $this->addSql('DROP INDEX IDX_29F367749F7E4405 ON activite_name');
        $this->addSql('ALTER TABLE activite_name DROP secteur_id');
    }
}
