<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_tag}}`.
 */
class m221106_184022_create_news_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_tag}}', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'idx-news_tag-news_id',
            'news_tag',
            'news_id'
        );

        $this->addForeignKey(
            'fk-news_tag-news_id',
            'news_tag',
            'news_id',
            'news',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-news_tag-tag_id',
            'news_tag',
            'tag_id'
        );

        $this->addForeignKey(
            'fk-news_tag-tag_id',
            'news_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-news_tag-news_id',
            'news_tag'
        );

        $this->dropIndex(
            'idx-news_tag-news_id',
            'news_tag'
        );

        $this->dropForeignKey(
            'fk-news_tag-tag_id',
            'news_tag'
        );

        $this->dropIndex(
            'idx-news_tag-tag_id',
            'news_tag'
        );

        $this->dropTable('{{%news_tag}}');
    }
}
