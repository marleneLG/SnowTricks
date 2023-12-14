<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231214094732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Messages (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, trick_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_22747CC0A76ED395 (user_id), INDEX IDX_22747CC0B281BE2E (trick_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Pictures (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Tricks (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_E67507F7A76ED395 (user_id), INDEX IDX_E67507F712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Videos (id INT AUTO_INCREMENT NOT NULL, url VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Messages ADD CONSTRAINT FK_22747CC0A76ED395 FOREIGN KEY (user_id) REFERENCES Users (id)');
        $this->addSql('ALTER TABLE Messages ADD CONSTRAINT FK_22747CC0B281BE2E FOREIGN KEY (trick_id) REFERENCES Tricks (id)');
        $this->addSql('ALTER TABLE Tricks ADD CONSTRAINT FK_E67507F7A76ED395 FOREIGN KEY (user_id) REFERENCES Users (id)');
        $this->addSql('ALTER TABLE Tricks ADD CONSTRAINT FK_E67507F712469DE2 FOREIGN KEY (category_id) REFERENCES Categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE Messages DROP FOREIGN KEY FK_22747CC0A76ED395');
        $this->addSql('ALTER TABLE Messages DROP FOREIGN KEY FK_22747CC0B281BE2E');
        $this->addSql('ALTER TABLE Tricks DROP FOREIGN KEY FK_E67507F7A76ED395');
        $this->addSql('ALTER TABLE Tricks DROP FOREIGN KEY FK_E67507F712469DE2');
        $this->addSql('DROP TABLE Categories');
        $this->addSql('DROP TABLE Messages');
        $this->addSql('DROP TABLE Pictures');
        $this->addSql('DROP TABLE Tricks');
        $this->addSql('DROP TABLE Videos');
    }
}
