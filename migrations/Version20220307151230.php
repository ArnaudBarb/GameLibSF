<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307151230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE editors (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, countries VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editors_has_studios (id_editor_id INT NOT NULL, id_studio_id INT NOT NULL, INDEX IDX_1B3FE2D1E9A0106B (id_editor_id), INDEX IDX_1B3FE2D1C45A9478 (id_studio_id), PRIMARY KEY(id_editor_id, id_studio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, game_title VARCHAR(255) NOT NULL, release_date DATE NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games_has_platforms (id INT AUTO_INCREMENT NOT NULL, id_game_id INT NOT NULL, id_platform_id INT NOT NULL, INDEX IDX_8E8E9FB43A127075 (id_game_id), INDEX IDX_8E8E9FB4E7F48498 (id_platform_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platforms (id INT AUTO_INCREMENT NOT NULL, manufacturers VARCHAR(255) NOT NULL, model VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roles (id INT AUTO_INCREMENT NOT NULL, role_name VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studios (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, countries VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studios_has_games (id_studio_id INT NOT NULL, id_game_id INT NOT NULL, INDEX IDX_4BE01A18C45A9478 (id_studio_id), INDEX IDX_4BE01A183A127075 (id_game_id), PRIMARY KEY(id_studio_id, id_game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_has_games_has_platforms (id_user_id INT NOT NULL, id_game_id INT NOT NULL, id_platform_id INT NOT NULL, rate SMALLINT DEFAULT NULL, INDEX IDX_37EADBB079F37AE5 (id_user_id), INDEX IDX_37EADBB03A127075 (id_game_id), INDEX IDX_37EADBB0E7F48498 (id_platform_id), PRIMARY KEY(id_user_id, id_game_id, id_platform_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, id_role_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name_user VARCHAR(255) NOT NULL, firstname_user VARCHAR(255) NOT NULL, pseudo_user VARCHAR(255) NOT NULL, account_creation_user DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', account_validation_user DATETIME NOT NULL, bio_user LONGTEXT DEFAULT NULL, avatar_user VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), UNIQUE INDEX UNIQ_1483A5E9EA5002AD (pseudo_user), INDEX IDX_1483A5E989E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE editors_has_studios ADD CONSTRAINT FK_1B3FE2D1E9A0106B FOREIGN KEY (id_editor_id) REFERENCES editors (id)');
        $this->addSql('ALTER TABLE editors_has_studios ADD CONSTRAINT FK_1B3FE2D1C45A9478 FOREIGN KEY (id_studio_id) REFERENCES studios (id)');
        $this->addSql('ALTER TABLE games_has_platforms ADD CONSTRAINT FK_8E8E9FB43A127075 FOREIGN KEY (id_game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE games_has_platforms ADD CONSTRAINT FK_8E8E9FB4E7F48498 FOREIGN KEY (id_platform_id) REFERENCES platforms (id)');
        $this->addSql('ALTER TABLE studios_has_games ADD CONSTRAINT FK_4BE01A18C45A9478 FOREIGN KEY (id_studio_id) REFERENCES studios (id)');
        $this->addSql('ALTER TABLE studios_has_games ADD CONSTRAINT FK_4BE01A183A127075 FOREIGN KEY (id_game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE user_has_games_has_platforms ADD CONSTRAINT FK_37EADBB079F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_has_games_has_platforms ADD CONSTRAINT FK_37EADBB03A127075 FOREIGN KEY (id_game_id) REFERENCES games_has_platforms (id)');
        $this->addSql('ALTER TABLE user_has_games_has_platforms ADD CONSTRAINT FK_37EADBB0E7F48498 FOREIGN KEY (id_platform_id) REFERENCES games_has_platforms (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E989E8BDC FOREIGN KEY (id_role_id) REFERENCES roles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE editors_has_studios DROP FOREIGN KEY FK_1B3FE2D1E9A0106B');
        $this->addSql('ALTER TABLE games_has_platforms DROP FOREIGN KEY FK_8E8E9FB43A127075');
        $this->addSql('ALTER TABLE studios_has_games DROP FOREIGN KEY FK_4BE01A183A127075');
        $this->addSql('ALTER TABLE user_has_games_has_platforms DROP FOREIGN KEY FK_37EADBB03A127075');
        $this->addSql('ALTER TABLE user_has_games_has_platforms DROP FOREIGN KEY FK_37EADBB0E7F48498');
        $this->addSql('ALTER TABLE games_has_platforms DROP FOREIGN KEY FK_8E8E9FB4E7F48498');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E989E8BDC');
        $this->addSql('ALTER TABLE editors_has_studios DROP FOREIGN KEY FK_1B3FE2D1C45A9478');
        $this->addSql('ALTER TABLE studios_has_games DROP FOREIGN KEY FK_4BE01A18C45A9478');
        $this->addSql('ALTER TABLE user_has_games_has_platforms DROP FOREIGN KEY FK_37EADBB079F37AE5');
        $this->addSql('DROP TABLE editors');
        $this->addSql('DROP TABLE editors_has_studios');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE games_has_platforms');
        $this->addSql('DROP TABLE platforms');
        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE studios');
        $this->addSql('DROP TABLE studios_has_games');
        $this->addSql('DROP TABLE user_has_games_has_platforms');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
