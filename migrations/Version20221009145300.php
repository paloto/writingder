<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009145300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE buddy_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, buddy_id INT NOT NULL, status VARCHAR(16) NOT NULL, INDEX IDX_93CE5AC6A76ED395 (user_id), INDEX IDX_93CE5AC6395CE8D6 (buddy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE buddy_request ADD CONSTRAINT FK_93CE5AC6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE buddy_request ADD CONSTRAINT FK_93CE5AC6395CE8D6 FOREIGN KEY (buddy_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE buddy_request DROP FOREIGN KEY FK_93CE5AC6A76ED395');
        $this->addSql('ALTER TABLE buddy_request DROP FOREIGN KEY FK_93CE5AC6395CE8D6');
        $this->addSql('DROP TABLE buddy_request');
    }
}
