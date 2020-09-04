<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m200904_104530_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(60)->notNull(),
            'text' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->defaultValue(new Expression('NOW()')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
