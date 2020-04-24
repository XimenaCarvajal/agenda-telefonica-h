<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200424002401 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contacto (id INT AUTO_INCREMENT NOT NULL, fktipocontacto_c_id INT NOT NULL, fkusuario_c_id INT NOT NULL, nombre_contacto VARCHAR(255) NOT NULL, organizacion_contacto VARCHAR(255) DEFAULT NULL, domicilio_contacto VARCHAR(255) DEFAULT NULL, nota_contacto LONGTEXT DEFAULT NULL, status_contacto VARCHAR(10) NOT NULL, uso_contacto VARCHAR(15) NOT NULL, INDEX IDX_2741493CF301D200 (fktipocontacto_c_id), INDEX IDX_2741493CCFE6FF09 (fkusuario_c_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE datocontacto (id INT AUTO_INCREMENT NOT NULL, fkcontacto_dc_id INT NOT NULL, tipo_dc VARCHAR(15) NOT NULL, valor_dc VARCHAR(255) NOT NULL, status_dc VARCHAR(10) NOT NULL, INDEX IDX_FFC0252263D029FC (fkcontacto_dc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipocontacto (id INT AUTO_INCREMENT NOT NULL, nombre_tipocontacto VARCHAR(255) NOT NULL, status_tipocontacto ENUM(\'Activo\', \'Inactivo\'), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuariocontacto (id INT AUTO_INCREMENT NOT NULL, status_uc VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuariocontacto_usuarios (usuariocontacto_id INT NOT NULL, usuarios_id INT NOT NULL, INDEX IDX_8ECBD340FB2BE673 (usuariocontacto_id), INDEX IDX_8ECBD340F01D3B25 (usuarios_id), PRIMARY KEY(usuariocontacto_id, usuarios_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuariocontacto_contacto (usuariocontacto_id INT NOT NULL, contacto_id INT NOT NULL, INDEX IDX_A77C1D8EFB2BE673 (usuariocontacto_id), INDEX IDX_A77C1D8E6B505CA9 (contacto_id), PRIMARY KEY(usuariocontacto_id, contacto_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, correo_usuario VARCHAR(255) NOT NULL, pass_usuario VARCHAR(255) NOT NULL, tipo_usuario ENUM(\'Admin\', \'Trabajador\'), status_usuario ENUM(\'Activo\', \'Inactivo\'), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493CF301D200 FOREIGN KEY (fktipocontacto_c_id) REFERENCES tipocontacto (id)');
        $this->addSql('ALTER TABLE contacto ADD CONSTRAINT FK_2741493CCFE6FF09 FOREIGN KEY (fkusuario_c_id) REFERENCES usuarios (id)');
        $this->addSql('ALTER TABLE datocontacto ADD CONSTRAINT FK_FFC0252263D029FC FOREIGN KEY (fkcontacto_dc_id) REFERENCES contacto (id)');
        $this->addSql('ALTER TABLE usuariocontacto_usuarios ADD CONSTRAINT FK_8ECBD340FB2BE673 FOREIGN KEY (usuariocontacto_id) REFERENCES usuariocontacto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuariocontacto_usuarios ADD CONSTRAINT FK_8ECBD340F01D3B25 FOREIGN KEY (usuarios_id) REFERENCES usuarios (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuariocontacto_contacto ADD CONSTRAINT FK_A77C1D8EFB2BE673 FOREIGN KEY (usuariocontacto_id) REFERENCES usuariocontacto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuariocontacto_contacto ADD CONSTRAINT FK_A77C1D8E6B505CA9 FOREIGN KEY (contacto_id) REFERENCES contacto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contacto CHANGE status_contacto status_contacto ENUM(\'Activo\', \'Inactivo\') NOT NULL');
        $this->addSql('ALTER TABLE contacto CHANGE uso_contacto uso_contacto ENUM(\'Personal\', \'General\') NOT NULL');
        $this->addSql('ALTER TABLE usuariocontacto CHANGE status_uc status_uc ENUM(\'Activo\', \'Inactivo\') NOT NULL');
        $this->addSql('ALTER TABLE datocontacto CHANGE status_dc status_dc ENUM(\'Activo\', \'Inactivo\') NOT NULL');
        $this->addSql('ALTER TABLE datocontacto CHANGE tipo_dc tipo_dc ENUM(\'Celular\', \'Teléfono\', \'Email\', \'Fax\') NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE datocontacto CHANGE status_dc status_dc VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE datocontacto CHANGE tipo_dc tipo_dc VARCHAR(15) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE usuariocontacto CHANGE status_uc status_uc VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE contacto CHANGE uso_contacto uso_contacto VARCHAR(15) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE contacto CHANGE status_contacto status_contacto VARCHAR(10) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE datocontacto DROP FOREIGN KEY FK_FFC0252263D029FC');
        $this->addSql('ALTER TABLE usuariocontacto_contacto DROP FOREIGN KEY FK_A77C1D8E6B505CA9');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493CF301D200');
        $this->addSql('ALTER TABLE usuariocontacto_usuarios DROP FOREIGN KEY FK_8ECBD340FB2BE673');
        $this->addSql('ALTER TABLE usuariocontacto_contacto DROP FOREIGN KEY FK_A77C1D8EFB2BE673');
        $this->addSql('ALTER TABLE contacto DROP FOREIGN KEY FK_2741493CCFE6FF09');
        $this->addSql('ALTER TABLE usuariocontacto_usuarios DROP FOREIGN KEY FK_8ECBD340F01D3B25');
        $this->addSql('DROP TABLE contacto');
        $this->addSql('DROP TABLE datocontacto');
        $this->addSql('DROP TABLE tipocontacto');
        $this->addSql('DROP TABLE usuariocontacto');
        $this->addSql('DROP TABLE usuariocontacto_usuarios');
        $this->addSql('DROP TABLE usuariocontacto_contacto');
        $this->addSql('DROP TABLE usuarios');
    }
}
