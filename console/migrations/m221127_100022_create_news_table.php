<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m221127_100022_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'image' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()->notNull(),
            'state' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-news-created_by',
            'news',
            'created_by'
        );

        $this->addForeignKey(
            'fk-news-created_by',
            'news',
            'created_by',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-news-state',
            'news',
            'state'
        );

        $this->addForeignKey(
            'fk-news-state',
            'news',
            'state',
            'state',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-news-created_by',
            'news'
        );

        $this->dropIndex(
            'idx-news-created_by',
            'news'
        );

        $this->dropForeignKey(
            'fk-news-state',
            'news'
        );

        $this->dropIndex(
            'idx-news-state',
            'news'
        );

        $this->dropTable('{{%news}}');
    }
}
