<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m220815_104135_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%settings}}', [
            'id' => $this->primaryKey(),
            'phone_number' => $this->bigInteger()->notNull(),
            'email' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'btn_text_home_page' => $this->string()->notNull(),
            'footer' => $this->string()->notNull(),
            'contact_information_text' => $this->text()->notNull(),
            'project_description' => $this->text()->notNull(),
            'yandex_map_x' => $this->float()->notNull(),
            'yandex_map_y' => $this->float()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}
