<?php

use yii\db\Migration;
use app\models\tables\Tasks;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;

/**
 * Class m190214_124402_add_column_to_table
 */
class m190214_124402_add_column_to_table extends Migration
{
    const CREATED_AT_ATTRIBUTE = 'created_at';
    const UPDATED_AT_ATTRIBUTE = 'updated_at';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // tasks table
        $this->addColumn(Tasks::tableName(), static::CREATED_AT_ATTRIBUTE, $this->dateTime());
        $this->addColumn(Tasks::tableName(), static::UPDATED_AT_ATTRIBUTE, $this->dateTime());

        // users table
        $this->addColumn(Users::tableName(), static::CREATED_AT_ATTRIBUTE, $this->dateTime());
        $this->addColumn(Users::tableName(), static::UPDATED_AT_ATTRIBUTE, $this->dateTime());

        // task_statuses table
        $this->addColumn(TaskStatuses::tableName(), static::CREATED_AT_ATTRIBUTE, $this->dateTime());
        $this->addColumn(TaskStatuses::tableName(), static::UPDATED_AT_ATTRIBUTE, $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // tasks table
        $this->dropColumn(Tasks::tableName(), static::CREATED_AT_ATTRIBUTE);
        $this->dropColumn(Tasks::tableName(), static::UPDATED_AT_ATTRIBUTE);

        // users table
        $this->dropColumn(Users::tableName(), static::CREATED_AT_ATTRIBUTE);
        $this->dropColumn(Users::tableName(), static::UPDATED_AT_ATTRIBUTE);

        // task_statuses table
        $this->dropColumn(TaskStatuses::tableName(), static::CREATED_AT_ATTRIBUTE);
        $this->dropColumn(TaskStatuses::tableName(), static::UPDATED_AT_ATTRIBUTE);
    }
}
