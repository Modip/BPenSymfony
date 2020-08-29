<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200828152316 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comptemor (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, agence_id INT DEFAULT NULL, solde VARCHAR(60) NOT NULL, frais VARCHAR(60) NOT NULL, date DATE NOT NULL, INDEX IDX_77A4450919EB6921 (client_id), INDEX IDX_77A44509D725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteph (id INT AUTO_INCREMENT NOT NULL, clientphysique_id INT DEFAULT NULL, typecompte_id INT DEFAULT NULL, agence_id INT DEFAULT NULL, numerocompte VARCHAR(60) NOT NULL, solde VARCHAR(60) NOT NULL, clerib VARCHAR(60) NOT NULL, agios VARCHAR(60) NOT NULL, INDEX IDX_CD1716EAA0CF2AA1 (clientphysique_id), INDEX IDX_CD1716EA11FA04BC (typecompte_id), INDEX IDX_CD1716EAD725330D (agence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comptemor ADD CONSTRAINT FK_77A4450919EB6921 FOREIGN KEY (client_id) REFERENCES client_moral (id)');
        $this->addSql('ALTER TABLE comptemor ADD CONSTRAINT FK_77A44509D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE compteph ADD CONSTRAINT FK_CD1716EAA0CF2AA1 FOREIGN KEY (clientphysique_id) REFERENCES client_physique (id)');
        $this->addSql('ALTER TABLE compteph ADD CONSTRAINT FK_CD1716EA11FA04BC FOREIGN KEY (typecompte_id) REFERENCES type_compte (id)');
        $this->addSql('ALTER TABLE compteph ADD CONSTRAINT FK_CD1716EAD725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE comptemor');
        $this->addSql('DROP TABLE compteph');
    }
}
