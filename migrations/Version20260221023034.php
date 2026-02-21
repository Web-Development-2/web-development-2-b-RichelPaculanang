<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260221023034 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE venue ADD relation_id INT NOT NULL');
        $this->addSql('ALTER TABLE venue ADD CONSTRAINT FK_91911B0D3256915B FOREIGN KEY (relation_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_91911B0D3256915B ON venue (relation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE venue DROP FOREIGN KEY FK_91911B0D3256915B');
        $this->addSql('DROP INDEX IDX_91911B0D3256915B ON venue');
        $this->addSql('ALTER TABLE venue DROP relation_id');
    }
}
