<?php

namespace app\commands;


use app\models\Mailer;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

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

            if (!Mailer::notify($task['email'], $subject, $message)) {
                $this->stdout("Error occurred!\n", Console::FG_RED, Console::BOLD);
                return ExitCode::UNSPECIFIED_ERROR;
            }
        }

        $this->stdout("Notifications successfully sent.\n", Console::FG_GREEN, Console::BOLD);
        return ExitCode::OK;
    }
}