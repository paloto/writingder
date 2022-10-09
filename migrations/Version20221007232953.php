<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221007232953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD age_range VARCHAR(255) NOT NULL, ADD modality VARCHAR(255) NOT NULL, ADD category VARCHAR(255) NOT NULL, ADD writing_topic VARCHAR(255) NOT NULL, ADD reading_topic VARCHAR(255) NOT NULL, ADD favorite_writers JSON NOT NULL, ADD frecuency VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP age_range, DROP modality, DROP category, DROP writing_topic, DROP reading_topic, DROP favorite_writers, DROP frecuency');
    }
}
