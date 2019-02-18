<?php

/**
 * @var \yii\data\ActiveDataProvider $dataProvider;
 * @var \app\models\filters\TaskSearch $searchModel;
 */

use yii\widgets\ListView;
use app\widgets\TaskPreviewWidget;

echo $this->render('_search', ['model' => $searchModel]);

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => function ($model) {
        return TaskPreviewWidget::widget(['model' => $model]);
    },
    'summary' => false,
    'options' => [
        'class' => 'preview-container'
    ]
]);