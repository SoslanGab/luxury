<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230928082634 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, candidate_id INT NOT NULL, offer_id INT NOT NULL, status TINYINT(1) NOT NULL, submitted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_A45BDDC191BD8781 (candidate_id), INDEX IDX_A45BDDC153C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, experience_id INT DEFAULT NULL, gender_id INT NOT NULL, category_id INT DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) DEFAULT NULL, is_passport_valid TINYINT(1) DEFAULT NULL, current_location VARCHAR(255) DEFAULT NULL, birth_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', place_of_birth VARCHAR(255) DEFAULT NULL, is_available TINYINT(1) DEFAULT NULL, short_description VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_C8B28E44A76ED395 (user_id), INDEX IDX_C8B28E4446E90E27 (experience_id), INDEX IDX_C8B28E44708A0E0 (gender_id), INDEX IDX_C8B28E4412469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, compagny_name VARCHAR(255) DEFAULT NULL, type_of_activity VARCHAR(255) DEFAULT NULL, contact_name VARCHAR(255) DEFAULT NULL, contact_position VARCHAR(255) DEFAULT NULL, contact_number VARCHAR(255) DEFAULT NULL, contact_email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, category_id INT NOT NULL, job_type_id INT DEFAULT NULL, reference VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, job_title VARCHAR(255) DEFAULT NULL, job_location VARCHAR(255) DEFAULT NULL, closing_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', salary INT DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_29D6873E19EB6921 (client_id), INDEX IDX_29D6873E12469DE2 (category_id), INDEX IDX_29D6873E5FA33B08 (job_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC191BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC153C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E5FA33B08 FOREIGN KEY (job_type_id) REFERENCES type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC191BD8781');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC153C674EE');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44A76ED395');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4446E90E27');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44708A0E0');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4412469DE2');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E19EB6921');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E12469DE2');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E5FA33B08');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE type');
    }
}
