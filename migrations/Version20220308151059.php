<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220308151059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP INDEX UNIQ_3AF34668C54C8C93, ADD INDEX IDX_3AF34668C54C8C93 (type_id)');
        $this->addSql('ALTER TABLE categories CHANGE type_id type_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP INDEX IDX_3AF34668C54C8C93, ADD UNIQUE INDEX UNIQ_3AF34668C54C8C93 (type_id)');
        $this->addSql('ALTER TABLE categories CHANGE type_id type_id INT NOT NULL');
    }
}
