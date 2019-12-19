<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191217212741 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, provider_id INT NOT NULL, product_id INT NOT NULL, price_of_unit DOUBLE PRECISION NOT NULL, date DATE NOT NULL, INDEX IDX_CAC822D9A53A8AA (provider_id), INDEX IDX_CAC822D94584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provider (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, telephone VARCHAR(12) NOT NULL, full_name VARCHAR(255) NOT NULL, account_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supply (id INT AUTO_INCREMENT NOT NULL, provider_id INT NOT NULL, price_id INT NOT NULL, delivery_time DATETIME NOT NULL, number_of_goods LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', products LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_D219948CA53A8AA (provider_id), INDEX IDX_D219948CD614C7E7 (price_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_login (id INT AUTO_INCREMENT NOT NULL, log VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D9A53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D94584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948CA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id)');
        $this->addSql('ALTER TABLE supply ADD CONSTRAINT FK_D219948CD614C7E7 FOREIGN KEY (price_id) REFERENCES price (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948CD614C7E7');
        $this->addSql('ALTER TABLE price DROP FOREIGN KEY FK_CAC822D9A53A8AA');
        $this->addSql('ALTER TABLE supply DROP FOREIGN KEY FK_D219948CA53A8AA');
        $this->addSql('DROP TABLE price');
        $this->addSql('DROP TABLE provider');
        $this->addSql('DROP TABLE supply');
        $this->addSql('DROP TABLE users_login');
    }
}
