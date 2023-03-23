<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323085610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE book ADD borrow_id INT DEFAULT NULL');
        // $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331D4C006C8 FOREIGN KEY (borrow_id) REFERENCES borrow (id)');
        // $this->addSql('CREATE INDEX IDX_CBE5A331D4C006C8 ON book (borrow_id)');
        // $this->addSql('ALTER TABLE borrow ADD id_user_id INT DEFAULT NULL');
        // $this->addSql('ALTER TABLE borrow ADD CONSTRAINT FK_55DBA8B079F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        // $this->addSql('CREATE INDEX IDX_55DBA8B079F37AE5 ON borrow (id_user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331D4C006C8');
        // $this->addSql('DROP INDEX IDX_CBE5A331D4C006C8 ON book');
        // $this->addSql('ALTER TABLE book DROP borrow_id');
        // $this->addSql('ALTER TABLE borrow DROP FOREIGN KEY FK_55DBA8B079F37AE5');
        // $this->addSql('DROP INDEX IDX_55DBA8B079F37AE5 ON borrow');
        // $this->addSql('ALTER TABLE borrow DROP id_user_id');
    }
}
