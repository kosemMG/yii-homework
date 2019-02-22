<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class LanguageController extends Controller
{
    public function actionIndex(string $language)
    {
        Yii::$app->language = $language;

        return $this->redirect(Yii::$app->request->referrer);
    }
}