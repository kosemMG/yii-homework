<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var $this yii\web\View
 * @var $model app\models\tables\Tasks
 * @var bool $hide
 */

if (!$hide) {
    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
}

?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            [
                'label' => 'Creator',
                'value' => $model->creator->name
            ],
            [
                'label' => 'Executor',
                'value' => $model->executor->name
            ],
            //'creator_id',
            //'executor_id',
            'due_date',
            //'status_id',
            [
                'label' => 'Status',
                'value' => $model->status->name
            ]
        ],
    ]) ?>

</div>
