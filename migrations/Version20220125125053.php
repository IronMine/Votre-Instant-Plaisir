<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125125053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE franchises (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD franchise_id INT DEFAULT NULL, ADD type VARCHAR(255) NOT NULL, ADD position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668523CAB89 FOREIGN KEY (franchise_id) REFERENCES franchises (id)');
        $this->addSql('CREATE INDEX IDX_3AF34668523CAB89 ON categories (franchise_id)');
        $this->addSql('ALTER TABLE images ADD categories_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AA21214B7 ON images (categories_id)');
        $this->addSql('ALTER TABLE items ADD description LONGTEXT DEFAULT NULL, ADD little_description VARCHAR(255) DEFAULT NULL, ADD sell INT DEFAULT NULL, ADD position INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668523CAB89');
        $this->addSql('DROP TABLE franchises');
        $this->addSql('DROP INDEX IDX_3AF34668523CAB89 ON categories');
        $this->addSql('ALTER TABLE categories DROP franchise_id, DROP type, DROP position');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AA21214B7');
        $this->addSql('DROP INDEX IDX_E01FBE6AA21214B7 ON images');
        $this->addSql('ALTER TABLE images DROP categories_id');
        $this->addSql('ALTER TABLE items DROP description, DROP little_description, DROP sell, DROP position');
    }
}
