<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323123723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
         //$this->addSql('ALTER TABLE borrow DROP FOREIGN KEY FK_55DBA8B079F37AE');
         //$this->addSql('DROP INDEX IDX_55DBA8B079F37AE5 ON borrow');
        //  $this->addSql('ALTER TABLE borrow CHANGE user_id user_id INT DEFAULT NULL');
        //  $this->addSql('ALTER TABLE borrow ADD CONSTRAINT FK_55DBA8B0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        //  $this->addSql('CREATE INDEX IDX_55DBA8B0A76ED395 ON borrow (user_id)');
        // $this->addSql('DROP INDEX `primary` ON user');
        // $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE borrow DROP FOREIGN KEY FK_55DBA8B0A76ED395');
        // $this->addSql('DROP INDEX IDX_55DBA8B0A76ED395 ON borrow');
        // $this->addSql('ALTER TABLE borrow CHANGE user_id user_id INT DEFAULT NULL');
        // $this->addSql('ALTER TABLE borrow ADD CONSTRAINT FK_55DBA8B079F37AE FOREIGN KEY (id_user_id) REFERENCES user (id)');
        // $this->addSql('CREATE INDEX IDX_55DBA8B079F37AE5 ON borrow (id_user_id)');
        // $this->addSql('DROP INDEX `PRIMARY` ON user');
        // $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id, uuid)');
    }
}
