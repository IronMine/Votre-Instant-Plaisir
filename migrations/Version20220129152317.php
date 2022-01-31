<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220129152317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, franchise_id INT DEFAULT NULL, type_id INT NOT NULL, name VARCHAR(255) NOT NULL, crud VARCHAR(255) NOT NULL, position INT DEFAULT NULL, INDEX IDX_3AF34668727ACA70 (parent_id), INDEX IDX_3AF34668523CAB89 (franchise_id), UNIQUE INDEX UNIQ_3AF34668C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE franchises (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, items_id INT DEFAULT NULL, categories_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A6BB0AE84 (items_id), INDEX IDX_E01FBE6AA21214B7 (categories_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE items (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, franchise_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, crud VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, little_description VARCHAR(255) DEFAULT NULL, sell INT DEFAULT NULL, position INT DEFAULT NULL, INDEX IDX_E11EE94DC54C8C93 (type_id), INDEX IDX_E11EE94DBCF5E72D (categorie_id), INDEX IDX_E11EE94D523CAB89 (franchise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, franchise_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8CDE5729523CAB89 (franchise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668523CAB89 FOREIGN KEY (franchise_id) REFERENCES franchises (id)');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A6BB0AE84 FOREIGN KEY (items_id) REFERENCES items (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AA21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94DC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE items ADD CONSTRAINT FK_E11EE94D523CAB89 FOREIGN KEY (franchise_id) REFERENCES franchises (id)');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE5729523CAB89 FOREIGN KEY (franchise_id) REFERENCES franchises (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AA21214B7');
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94DBCF5E72D');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668523CAB89');
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94D523CAB89');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE5729523CAB89');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A6BB0AE84');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668C54C8C93');
        $this->addSql('ALTER TABLE items DROP FOREIGN KEY FK_E11EE94DC54C8C93');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE franchises');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE items');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE `user`');
    }
}
