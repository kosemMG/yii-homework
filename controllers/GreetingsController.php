<?php

namespace app\controllers;


use yii\web\Controller;

class GreetingsController extends Controller
{

    public function actionIndex()
    {
        return $this->render('hello', ['user' => 'admin']);
    }
}