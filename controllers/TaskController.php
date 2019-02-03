<?php

namespace app\controllers;


use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $model = new Task([
            'title' => 'Task tracker',
            'description' => 'Bla-bla-bla',
            'executor' => 'Moshe',
            'due_date' => '2019-02-15'
        ]);
    }
}