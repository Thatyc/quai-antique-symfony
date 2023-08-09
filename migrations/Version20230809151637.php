<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230809151637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939885405FD2');
        $this->addSql('DROP TABLE `table`');
        $this->addSql('DROP INDEX IDX_F529939885405FD2 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP tables_id, DROP time');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `table` (id INT AUTO_INCREMENT NOT NULL, places VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, number_table INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `order` ADD tables_id INT NOT NULL, ADD time TIME NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939885405FD2 FOREIGN KEY (tables_id) REFERENCES `table` (id)');
        $this->addSql('CREATE INDEX IDX_F529939885405FD2 ON `order` (tables_id)');
    }
}
