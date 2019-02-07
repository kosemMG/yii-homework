<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m190206_124938_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'login' => $this->string(50)->notNull(),
            'password' => $this->string(50)->notNull(),
            'name' => $this->string(100)->notNull(),
            'email' => $this->string(70)->unique()->notNull()
        ]);

        $this->createIndex('idx_users_login', 'users', 'login', true);
        $this->createIndex('idx_users_email', 'users', 'email', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
