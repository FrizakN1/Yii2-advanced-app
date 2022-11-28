<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m220815_104135_create_settings_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%settings}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull()->unique(),
            'value' => $this->text()->notNull(),
            'description' => $this->string(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}
