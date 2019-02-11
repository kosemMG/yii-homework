<?php

use yii\db\Migration;

/**
 * Class m190211_163929_fk_users
 */
class m190211_163929_fk_users extends Migration
{
    protected $table_name = 'users';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tasks_table = \app\models\tables\Tasks::tableName();

        $this->addForeignKey('fk_users_creator', $tasks_table, 'creator_id', $this->table_name, 'id');
        $this->addForeignKey('fk_users_executor', $tasks_table, 'executor_id', $this->table_name, 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $tasks_table = \app\models\tables\Tasks::tableName();

        $this->dropForeignKey('fk_users_creator', $tasks_table);
        $this->dropForeignKey('fk_users_executor', $tasks_table);
    }
}
