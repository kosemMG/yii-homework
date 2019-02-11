<?php

namespace app\widgets;


use app\models\tables\Tasks;
use yii\base\Widget;

class TaskCard extends Widget
{
    public function run()
    {
//        $model = Tasks::findOne(5);

        return $this->render('task_card'/*, [
            'title' => $model->title,
            'description' => $model->description,
            'executor' => $model->executor->name
        ]*/);
    }
}