<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827093932 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence DROP FOREIGN KEY FK_64C19AA9F2C56620');
        $this->addSql('DROP INDEX IDX_64C19AA9F2C56620 ON agence');
        $this->addSql('ALTER TABLE agence DROP compte_id, CHANGE nom nom VARCHAR(60) NOT NULL, CHANGE region region VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE client_moral DROP FOREIGN KEY FK_83FF4A8529BC2A3');
        $this->addSql('ALTER TABLE client_moral DROP FOREIGN KEY FK_83FF4A8F2C56620');
        $this->addSql('DROP INDEX IDX_83FF4A8F2C56620 ON client_moral');
        $this->addSql('DROP INDEX IDX_83FF4A8529BC2A3 ON client_moral');
        $this->addSql('ALTER TABLE client_moral DROP client_physique_id, DROP compte_id, DROP raisonsocial, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE login login VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE client_physique DROP FOREIGN KEY FK_B11F1822F2C56620');
        $this->addSql('DROP INDEX IDX_B11F1822F2C56620 ON client_physique');
        $this->addSql('ALTER TABLE client_physique DROP compte_id, DROP cni, CHANGE prenom prenom VARCHAR(60) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE telephone telephone VARCHAR(60) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE login login VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE compte ADD cltphysique_id_id INT DEFAULT NULL, ADD cltmoral_id_id INT DEFAULT NULL, ADD agence_id_id INT DEFAULT NULL, ADD typecomte_id_id INT DEFAULT NULL, ADD agios VARCHAR(255) NOT NULL, CHANGE numerocompte numerocompte VARCHAR(255) NOT NULL, CHANGE clerib clerib VARCHAR(255) NOT NULL, CHANGE solde solde VARCHAR(255) NOT NULL, CHANGE dateou date DATE NOT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526028C5FEA4 FOREIGN KEY (cltphysique_id_id) REFERENCES client_physique (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260E3123056 FOREIGN KEY (cltmoral_id_id) REFERENCES client_moral (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260D1F6E7C3 FOREIGN KEY (agence_id_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260E41371C6 FOREIGN KEY (typecomte_id_id) REFERENCES type_compte (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526028C5FEA4 ON compte (cltphysique_id_id)');
        $this->addSql('CREATE INDEX IDX_CFF65260E3123056 ON compte (cltmoral_id_id)');
        $this->addSql('CREATE INDEX IDX_CFF65260D1F6E7C3 ON compte (agence_id_id)');
        $this->addSql('CREATE INDEX IDX_CFF65260E41371C6 ON compte (typecomte_id_id)');
        $this->addSql('ALTER TABLE type_compte DROP FOREIGN KEY FK_EC213958F2C56620');
        $this->addSql('DROP INDEX IDX_EC213958F2C56620 ON type_compte');
        $this->addSql('ALTER TABLE type_compte DROP compte_id, CHANGE libelle libelle VARCHAR(60) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence ADD compte_id INT NOT NULL, CHANGE nom nom VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE region region VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE agence ADD CONSTRAINT FK_64C19AA9F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_64C19AA9F2C56620 ON agence (compte_id)');
        $this->addSql('ALTER TABLE client_moral ADD client_physique_id INT DEFAULT NULL, ADD compte_id INT NOT NULL, ADD raisonsocial VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone INT NOT NULL, CHANGE email email VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE login login VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client_moral ADD CONSTRAINT FK_83FF4A8529BC2A3 FOREIGN KEY (client_physique_id) REFERENCES client_physique (id)');
        $this->addSql('ALTER TABLE client_moral ADD CONSTRAINT FK_83FF4A8F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_83FF4A8F2C56620 ON client_moral (compte_id)');
        $this->addSql('CREATE INDEX IDX_83FF4A8529BC2A3 ON client_moral (client_physique_id)');
        $this->addSql('ALTER TABLE client_physique ADD compte_id INT NOT NULL, ADD cni INT NOT NULL, CHANGE prenom prenom VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(200) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE adresse adresse VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE telephone telephone INT NOT NULL, CHANGE email email VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE login login VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client_physique ADD CONSTRAINT FK_B11F1822F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_B11F1822F2C56620 ON client_physique (compte_id)');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526028C5FEA4');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260E3123056');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260D1F6E7C3');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260E41371C6');
        $this->addSql('DROP INDEX IDX_CFF6526028C5FEA4 ON compte');
        $this->addSql('DROP INDEX IDX_CFF65260E3123056 ON compte');
        $this->addSql('DROP INDEX IDX_CFF65260D1F6E7C3 ON compte');
        $this->addSql('DROP INDEX IDX_CFF65260E41371C6 ON compte');
        $this->addSql('ALTER TABLE compte DROP cltphysique_id_id, DROP cltmoral_id_id, DROP agence_id_id, DROP typecomte_id_id, DROP agios, CHANGE numerocompte numerocompte INT NOT NULL, CHANGE solde solde NUMERIC(10, 0) NOT NULL, CHANGE clerib clerib INT NOT NULL, CHANGE date dateou DATE NOT NULL');
        $this->addSql('ALTER TABLE type_compte ADD compte_id INT NOT NULL, CHANGE libelle libelle VARCHAR(55) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_compte ADD CONSTRAINT FK_EC213958F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('CREATE INDEX IDX_EC213958F2C56620 ON type_compte (compte_id)');
    }
}
