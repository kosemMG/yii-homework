<?php

namespace app\controllers;

use Yii;
use app\models\Upload;
use yii\web\Controller;
use yii\web\UploadedFile;

class UploadController extends Controller
{
    public function actionIndex()
    {
        $model = new Upload();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');

            $model->run();
        }

        return $this->render('index', ['model' => new Upload()]);
    }
}