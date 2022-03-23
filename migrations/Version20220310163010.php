<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220310163010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs ADD qualite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315EA6338570 FOREIGN KEY (qualite_id) REFERENCES qualite (id)');
        $this->addSql('CREATE INDEX IDX_497B315EA6338570 ON utilisateurs (qualite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315EA6338570');
        $this->addSql('DROP INDEX IDX_497B315EA6338570 ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs DROP qualite_id');
    }
}
