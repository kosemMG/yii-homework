<?php

use yii\helpers\Url;


/** @var $model \app\models\tables\Tasks */
?>

<div class="task-container">
    <a class="task-preview-link" href="<?= Url::to(['task/one', 'id' => $model->id]) ?>">
        <div class="task-preview">
            <div class="task-preview-header">Title: <?= $model->title ?></div>
            <div class="task-preview-content">Description: <?= $model->description ?></div>
            <div class="task-preview-user">Responsible: <?= $model->executor->name ?></div>
            <div class="task-preview-user">Due date: <?= $model->due_date ?></div>
        </div>
    </a>
</div>