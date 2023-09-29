<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230929093706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application ADD candidate_id INT NOT NULL, ADD offer_id INT DEFAULT NULL, CHANGE submitted_at submitted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE status status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC191BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC153C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC191BD8781 ON application (candidate_id)');
        $this->addSql('CREATE INDEX IDX_A45BDDC153C674EE ON application (offer_id)');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E443E030ACD');
        $this->addSql('DROP INDEX IDX_C8B28E443E030ACD ON candidate');
        $this->addSql('ALTER TABLE candidate ADD gender_id INT NOT NULL, ADD category_id INT NOT NULL, ADD experience_id INT NOT NULL, DROP application_id, CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4412469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E4446E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44708A0E0 ON candidate (gender_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4412469DE2 ON candidate (category_id)');
        $this->addSql('CREATE INDEX IDX_C8B28E4446E90E27 ON candidate (experience_id)');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C153C674EE');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C191BD8781');
        $this->addSql('DROP INDEX IDX_64C19C191BD8781 ON category');
        $this->addSql('DROP INDEX IDX_64C19C153C674EE ON category');
        $this->addSql('ALTER TABLE category DROP candidate_id, DROP offer_id');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045553C674EE');
        $this->addSql('DROP INDEX IDX_C744045553C674EE ON client');
        $this->addSql('ALTER TABLE client DROP offer_id, CHANGE notes notes VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C10391BD8781');
        $this->addSql('DROP INDEX IDX_590C10391BD8781 ON experience');
        $this->addSql('ALTER TABLE experience DROP candidate_id, CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE gender DROP FOREIGN KEY FK_C7470A4291BD8781');
        $this->addSql('DROP INDEX IDX_C7470A4291BD8781 ON gender');
        $this->addSql('ALTER TABLE gender DROP candidate_id, CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E3E030ACD');
        $this->addSql('DROP INDEX IDX_29D6873E3E030ACD ON offer');
        $this->addSql('ALTER TABLE offer ADD client_id INT NOT NULL, ADD job_type_id INT NOT NULL, ADD category_id INT NOT NULL, DROP application_id');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E5FA33B08 FOREIGN KEY (job_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_29D6873E19EB6921 ON offer (client_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E5FA33B08 ON offer (job_type_id)');
        $this->addSql('CREATE INDEX IDX_29D6873E12469DE2 ON offer (category_id)');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE572953C674EE');
        $this->addSql('DROP INDEX IDX_8CDE572953C674EE ON type');
        $this->addSql('ALTER TABLE type DROP offer_id, CHANGE name name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC191BD8781');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC153C674EE');
        $this->addSql('DROP INDEX IDX_A45BDDC191BD8781 ON application');
        $this->addSql('DROP INDEX IDX_A45BDDC153C674EE ON application');
        $this->addSql('ALTER TABLE application DROP candidate_id, DROP offer_id, CHANGE submitted_at submitted_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE status status TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44708A0E0');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4412469DE2');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E4446E90E27');
        $this->addSql('DROP INDEX IDX_C8B28E44708A0E0 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4412469DE2 ON candidate');
        $this->addSql('DROP INDEX IDX_C8B28E4446E90E27 ON candidate');
        $this->addSql('ALTER TABLE candidate ADD application_id INT DEFAULT NULL, DROP gender_id, DROP category_id, DROP experience_id, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E443E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C8B28E443E030ACD ON candidate (application_id)');
        $this->addSql('ALTER TABLE type ADD offer_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE572953C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8CDE572953C674EE ON type (offer_id)');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E19EB6921');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E5FA33B08');
        $this->addSql('ALTER TABLE offer DROP FOREIGN KEY FK_29D6873E12469DE2');
        $this->addSql('DROP INDEX IDX_29D6873E19EB6921 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E5FA33B08 ON offer');
        $this->addSql('DROP INDEX IDX_29D6873E12469DE2 ON offer');
        $this->addSql('ALTER TABLE offer ADD application_id INT DEFAULT NULL, DROP client_id, DROP job_type_id, DROP category_id');
        $this->addSql('ALTER TABLE offer ADD CONSTRAINT FK_29D6873E3E030ACD FOREIGN KEY (application_id) REFERENCES application (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_29D6873E3E030ACD ON offer (application_id)');
        $this->addSql('ALTER TABLE experience ADD candidate_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C10391BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_590C10391BD8781 ON experience (candidate_id)');
        $this->addSql('ALTER TABLE category ADD candidate_id INT DEFAULT NULL, ADD offer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C153C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C191BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_64C19C191BD8781 ON category (candidate_id)');
        $this->addSql('CREATE INDEX IDX_64C19C153C674EE ON category (offer_id)');
        $this->addSql('ALTER TABLE gender ADD candidate_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gender ADD CONSTRAINT FK_C7470A4291BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C7470A4291BD8781 ON gender (candidate_id)');
        $this->addSql('ALTER TABLE client ADD offer_id INT DEFAULT NULL, CHANGE notes notes LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045553C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C744045553C674EE ON client (offer_id)');
    }
}
