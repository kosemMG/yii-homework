<?php

namespace app\controllers;


use app\models\tables\Tasks;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $model = new Tasks([
            'title' => 'Task tracker',
            'description' => 'Bla-bla-bla',
            'creator_id' => 'David',
            'executor_id' => 'Moshe',
            'due_date' => '2019-02-15'
        ]);
    }
}