<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230902151844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD heure_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398F2A733EB FOREIGN KEY (heure_id) REFERENCES horaire (id)');
        $this->addSql('CREATE INDEX IDX_F5299398F2A733EB ON `order` (heure_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398F2A733EB');
        $this->addSql('DROP INDEX IDX_F5299398F2A733EB ON `order`');
        $this->addSql('ALTER TABLE `order` DROP heure_id');
    }
}
