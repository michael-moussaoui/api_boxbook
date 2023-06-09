<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230323142906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A33141391494');
        // $this->addSql('DROP INDEX IDX_CBE5A33141391494 ON book');
        // $this->addSql('ALTER TABLE book CHANGE boxbook_id boxbook_id_id INT DEFAULT NULL');
        // $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331EDF08A00 FOREIGN KEY (boxbook_id_id) REFERENCES box_book (id)');
        // $this->addSql('CREATE INDEX IDX_CBE5A331EDF08A00 ON book (boxbook_id_id)');
        // $this->addSql('DROP INDEX `primary` ON user');
        // $this->addSql('ALTER TABLE user CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE uuid uuid VARCHAR(180) NOT NULL');
        // $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331EDF08A00');
        // $this->addSql('DROP INDEX IDX_CBE5A331EDF08A00 ON book');
        // $this->addSql('ALTER TABLE book CHANGE boxbook_id_id boxbook_id INT DEFAULT NULL');
        // $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A33141391494 FOREIGN KEY (boxbook_id) REFERENCES box_book (id)');
        // $this->addSql('CREATE INDEX IDX_CBE5A33141391494 ON book (boxbook_id)');
        // $this->addSql('ALTER TABLE user MODIFY id INT NOT NULL');
        // $this->addSql('DROP INDEX `PRIMARY` ON user');
        // $this->addSql('ALTER TABLE user CHANGE id id INT NOT NULL, CHANGE uuid uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        // $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id, uuid)');
    }
}
