<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class Mailer is a wrapper for mailer component.
 * @package app\models
 */
class Mailer extends Model
{
    /**
     * Gets a prepared data array from DB.
     * @return array
     * @throws \yii\db\Exception
     */
    public static function getTasks()
    {
        $sql = "SELECT tasks.id AS id, title, due_date, name, email FROM tasks
                LEFT JOIN users ON tasks.executor_id = users.id
                WHERE DATE(due_date) - DATE(NOW()) = 1";

       return Yii::$app->db->createCommand($sql)->queryAll();
    }

    /**
     * Sends a notification.
     * @param $email
     * @param $subject
     * @param $message
     * @return bool
     */
    public static function notify($email, $subject, $message)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setSubject($subject)
            ->setTextBody($message)
            ->send();
    }
}