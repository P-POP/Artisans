<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616134233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artisan ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C600AD3C54C8C93 ON artisan (type_id)');
        $this->addSql('ALTER TABLE owner ADD artisan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE owner ADD CONSTRAINT FK_CF60E67C5ED3C7B7 FOREIGN KEY (artisan_id) REFERENCES artisan (id)');
        $this->addSql('CREATE INDEX IDX_CF60E67C5ED3C7B7 ON owner (artisan_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3C54C8C93');
        $this->addSql('DROP INDEX UNIQ_3C600AD3C54C8C93 ON artisan');
        $this->addSql('ALTER TABLE artisan DROP type_id');
        $this->addSql('ALTER TABLE owner DROP FOREIGN KEY FK_CF60E67C5ED3C7B7');
        $this->addSql('DROP INDEX IDX_CF60E67C5ED3C7B7 ON owner');
        $this->addSql('ALTER TABLE owner DROP artisan_id');
    }
}
