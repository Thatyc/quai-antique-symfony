<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508115908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `table` ADD reservation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `table` ADD CONSTRAINT FK_F6298F46B83297E7 FOREIGN KEY (reservation_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_F6298F46B83297E7 ON `table` (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `table` DROP FOREIGN KEY FK_F6298F46B83297E7');
        $this->addSql('DROP INDEX IDX_F6298F46B83297E7 ON `table`');
        $this->addSql('ALTER TABLE `table` DROP reservation_id');
    }
}
