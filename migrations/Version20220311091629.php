<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311091629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites ADD activite_name_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activites ADD CONSTRAINT FK_766B5EB53BB15B53 FOREIGN KEY (activite_name_id) REFERENCES activite_name (id)');
        $this->addSql('CREATE INDEX IDX_766B5EB53BB15B53 ON activites (activite_name_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activites DROP FOREIGN KEY FK_766B5EB53BB15B53');
        $this->addSql('DROP INDEX IDX_766B5EB53BB15B53 ON activites');
        $this->addSql('ALTER TABLE activites DROP activite_name_id');
    }
}
