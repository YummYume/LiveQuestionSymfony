<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201012133643 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, profile_id INT NOT NULL, title VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_DADD4A251E27F6BF (question_id), UNIQUE INDEX UNIQ_DADD4A25CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE friend (id INT AUTO_INCREMENT NOT NULL, profile_sender_id INT NOT NULL, profile_receiver_id INT NOT NULL, request_status INT NOT NULL, UNIQUE INDEX UNIQ_55EEAC614ABB5AE6 (profile_sender_id), UNIQUE INDEX UNIQ_55EEAC61D84EABC8 (profile_receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, profile_id INT NOT NULL, UNIQUE INDEX UNIQ_AC6340B31E27F6BF (question_id), UNIQUE INDEX UNIQ_AC6340B3CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, username VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8157AA0FD60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, profile_id INT NOT NULL, title VARCHAR(255) NOT NULL, date DATETIME NOT NULL, visible INT NOT NULL, UNIQUE INDEX UNIQ_B6F7494E12469DE2 (category_id), UNIQUE INDEX UNIQ_B6F7494ECCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC614ABB5AE6 FOREIGN KEY (profile_sender_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE friend ADD CONSTRAINT FK_55EEAC61D84EABC8 FOREIGN KEY (profile_receiver_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B31E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FD60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494ECCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E12469DE2');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A25CCFA12B8');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC614ABB5AE6');
        $this->addSql('ALTER TABLE friend DROP FOREIGN KEY FK_55EEAC61D84EABC8');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3CCFA12B8');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494ECCFA12B8');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B31E27F6BF');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FD60322AC');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE friend');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE role');
    }
}
