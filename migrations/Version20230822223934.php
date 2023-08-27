<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822223934 extends AbstractMigration
{
    public function getname(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pricing_plan (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, price INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE pricing_plan_pricing_plan_feature (pricing_plan_id INTEGER NOT NULL, pricing_plan_feature_id INTEGER NOT NULL, PRIMARY KEY(pricing_plan_id, pricing_plan_feature_id), CONSTRAINT FK_D19087D429628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_D19087D46C9002D8 FOREIGN KEY (pricing_plan_feature_id) REFERENCES pricing_plan_feature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_D19087D429628C71 ON pricing_plan_pricing_plan_feature (pricing_plan_id)');
        $this->addSql('CREATE INDEX IDX_D19087D46C9002D8 ON pricing_plan_pricing_plan_feature (pricing_plan_feature_id)');
        $this->addSql('CREATE TABLE pricing_plan_benefit (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pricing_plan_id INTEGER NOT NULL, name VARCHAR(50) NOT NULL, CONSTRAINT FK_E6A62C5F29628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_E6A62C5F29628C71 ON pricing_plan_benefit (pricing_plan_id)');
        $this->addSql('CREATE TABLE pricing_plan_feature (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');

        $this->addSql("INSERT INTO pricing_plan (name, price) VALUES ('Free', 0)");
        $this->addSql("INSERT INTO pricing_plan (name, price) VALUES ('Pro', 15)");
        $this->addSql("INSERT INTO pricing_plan (name, price) VALUES ('Enterprise', 29)");

        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (1, '10 users included')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (1, '2 GB of storage')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (1, 'Email support')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (1, 'Help center access')");

        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (2, '20 users included')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (2, '10 GB of storage')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (2, 'Priority email support')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (2, 'Help center access')");

        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (3, '30 users included')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (3, '15 GB of storage')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (3, 'Phone and email support')");
        $this->addSql("INSERT INTO pricing_plan_benefit (pricing_plan_id, name) VALUES (3, 'Help center access')");

        $this->addSql("INSERT INTO pricing_plan_feature (name) VALUES ('Public')");
        $this->addSql("INSERT INTO pricing_plan_feature (name) VALUES ('Private')");
        $this->addSql("INSERT INTO pricing_plan_feature (name) VALUES ('Permissions')");
        $this->addSql("INSERT INTO pricing_plan_feature (name) VALUES ('Sharing')");
        $this->addSql("INSERT INTO pricing_plan_feature (name) VALUES ('Unlimited members')");
        $this->addSql("INSERT INTO pricing_plan_feature (name) VALUES ('Extra security')");

        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(1, 1)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(1, 3)");

        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 1)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 2)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 3)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 4)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 5)");

        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 1)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 2)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 3)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 4)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 5)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 6)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pricing_plan');
        $this->addSql('DROP TABLE pricing_plan_pricing_plan_feature');
        $this->addSql('DROP TABLE pricing_plan_benefit');
        $this->addSql('DROP TABLE pricing_plan_feature');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
