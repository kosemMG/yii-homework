<?php

/**
 * @var $this yii\web\View
 * @var $model app\models\tables\Tasks
 * @var bool $hide
 */

?>

    <a href="?r=admin-task%2Fview&id=<?= $model->id ?>" style="border: 1px solid blue; display: inline-block; padding: 15px; margin: 15px">
        <h2><?= $model->title ?></h2>
        <p><?= $model->description ?></p>
        <p><?= $model->executor->name ?></p>
        <p><?= $model->due_date ?></p>
    </a>



