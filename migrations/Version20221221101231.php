<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221221101231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_line_item (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, order_entity_id INT NOT NULL, name VARCHAR(255) NOT NULL, quantity INT NOT NULL, INDEX IDX_28D1AD3F4584665A (product_id), INDEX IDX_28D1AD3F3DA206A5 (order_entity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_line_item ADD CONSTRAINT FK_28D1AD3F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_line_item ADD CONSTRAINT FK_28D1AD3F3DA206A5 FOREIGN KEY (order_entity_id) REFERENCES `order` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_line_item DROP FOREIGN KEY FK_28D1AD3F4584665A');
        $this->addSql('ALTER TABLE order_line_item DROP FOREIGN KEY FK_28D1AD3F3DA206A5');
        $this->addSql('DROP TABLE order_line_item');
    }
}
