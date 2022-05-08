<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220808120809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_5373C96625682999');
//        $this->addSql('DROP INDEX FK_5373C96625682999 ON product');
//        $this->addSql('ALTER TABLE product CHANGE rate rate_id INT NOT NULL');
//        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBC999F9F FOREIGN KEY (rate_id) REFERENCES vat (id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04ADBC999F9F ON product (rate_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADBC999F9F');
//        $this->addSql('DROP INDEX UNIQ_D34A04ADBC999F9F ON product');
//        $this->addSql('ALTER TABLE product CHANGE rate_id rate INT NOT NULL');
//        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_5373C96625682999 FOREIGN KEY (rate) REFERENCES vat (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
//        $this->addSql('CREATE INDEX FK_5373C96625682999 ON product (rate)');
    }
}
