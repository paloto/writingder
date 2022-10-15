<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221009201331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE age_range age_range VARCHAR(255) DEFAULT NULL, CHANGE modality modality VARCHAR(255) DEFAULT NULL, CHANGE category category VARCHAR(255) DEFAULT NULL, CHANGE writing_topic writing_topic JSON DEFAULT NULL, CHANGE reading_topic reading_topic JSON DEFAULT NULL, CHANGE favorite_writers favorite_writers JSON DEFAULT NULL, CHANGE frecuency frecuency VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE language language VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE age_range age_range VARCHAR(255) NOT NULL, CHANGE modality modality VARCHAR(255) NOT NULL, CHANGE category category VARCHAR(255) NOT NULL, CHANGE writing_topic writing_topic JSON NOT NULL, CHANGE reading_topic reading_topic JSON NOT NULL, CHANGE favorite_writers favorite_writers JSON NOT NULL, CHANGE frecuency frecuency VARCHAR(255) NOT NULL, CHANGE country country VARCHAR(255) NOT NULL, CHANGE language language VARCHAR(255) NOT NULL');
    }
}
