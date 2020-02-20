<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220201259 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE localidad (id INT AUTO_INCREMENT NOT NULL, pais VARCHAR(150) NOT NULL, ciudad VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE productos (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, localidad_id INT NOT NULL, nombre VARCHAR(150) NOT NULL, descripcion LONGTEXT NOT NULL, precio DOUBLE PRECISION NOT NULL, INDEX IDX_767490E63397707A (categoria_id), INDEX IDX_767490E667707C89 (localidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE servicio (id INT AUTO_INCREMENT NOT NULL, servicio_id INT NOT NULL, descripcion VARCHAR(250) NOT NULL, comentario LONGTEXT NOT NULL, calificacion INT NOT NULL, INDEX IDX_CB86F22A71CAA3E7 (servicio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E63397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E667707C89 FOREIGN KEY (localidad_id) REFERENCES localidad (id)');
        $this->addSql('ALTER TABLE servicio ADD CONSTRAINT FK_CB86F22A71CAA3E7 FOREIGN KEY (servicio_id) REFERENCES productos (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E63397707A');
        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E667707C89');
        $this->addSql('ALTER TABLE servicio DROP FOREIGN KEY FK_CB86F22A71CAA3E7');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE localidad');
        $this->addSql('DROP TABLE productos');
        $this->addSql('DROP TABLE servicio');
    }
}
