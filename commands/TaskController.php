<?php

namespace app\commands;


use app\models\Mailer;
use Yii;
use yii\console\Controller;

/**
 * Class TaskController contains task utilities.
 * @package app\commands
 */
class TaskController extends Controller
{
    /**
     * Notifies a user when the task due date expires in less than one day.
     * @throws \yii\db\Exception
     */
    public function actionNotify()
    {
        $tasks = Mailer::getTasks();
        $subject = 'Hurry up!';

        foreach ($tasks as $task) {
            $taskReference = "http://yii.homework/tasks/{$task['id']}";
            $message = "Dear {$task['name']}, the task {$task['title']} due date expires in less than one day 
                on {$task['due_date']}. \nPlease, follow to {$taskReference} and finish it.\n";

            Mailer::notify($task['email'], $subject, $message);
        }
    }
}