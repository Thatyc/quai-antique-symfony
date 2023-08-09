<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230801202049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939885405FD2 FOREIGN KEY (tables_id) REFERENCES `table` (id)');
        $this->addSql('ALTER TABLE `order` RENAME INDEX tables_id TO IDX_F529939885405FD2');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE horaire');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939885405FD2');
        $this->addSql('ALTER TABLE `order` RENAME INDEX idx_f529939885405fd2 TO tables_id');
    }
}
