<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220311092547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs ADD email_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EA832C1C9 FOREIGN KEY (email_id) REFERENCES connexion (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_497B315EA832C1C9 ON utilisateurs (email_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EA832C1C9');
        $this->addSql('DROP INDEX UNIQ_497B315EA832C1C9 ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs DROP email_id');
    }
}
