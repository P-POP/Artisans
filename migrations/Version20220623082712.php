<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220623082712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE owner ADD CONSTRAINT FK_CF60E67CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_CF60E67CA76ED395 ON owner (user_id)');
        $this->addSql('ALTER TABLE user ADD last_name VARCHAR(80) NOT NULL, ADD first_name VARCHAR(80) NOT NULL, ADD pseudo VARCHAR(80) NOT NULL, DROP is_verified');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE owner DROP FOREIGN KEY FK_CF60E67CA76ED395');
        $this->addSql('DROP INDEX IDX_CF60E67CA76ED395 ON owner');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL, DROP last_name, DROP first_name, DROP pseudo');
    }
}
