<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221102306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP INDEX FK_F5299398E92F8F78, ADD UNIQUE INDEX UNIQ_F5299398E92F8F78 (recipient_id)');
        $this->addSql('ALTER TABLE `order` ADD company_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_F5299398979B1AD6 ON `order` (company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP INDEX UNIQ_F5299398E92F8F78, ADD INDEX FK_F5299398E92F8F78 (recipient_id)');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398979B1AD6');
        $this->addSql('DROP INDEX IDX_F5299398979B1AD6 ON `order`');
        $this->addSql('ALTER TABLE `order` DROP company_id');
    }
}
