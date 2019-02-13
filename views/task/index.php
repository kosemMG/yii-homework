<?php

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

use yii\widgets\ListView;
use app\widgets\TaskPreviewWidget;

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