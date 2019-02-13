<?php

namespace app\controllers;


use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TaskController extends Controller
{
    /**
     * Displays task previews.
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * Displays a task preview.
     * @param $id
     */
    public function actionOne($id)
    {
        var_dump($id); exit;
    }
}