<?php

/**
 * @var \app\models\tables\Tasks $taskModel
 * @var \app\models\Upload $uploadModel
 * @var array $statuses
 * @var array $users
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<div>
    <ul class="lang">
        <li><?= Html::a('en', \yii\helpers\Url::to(['task/one', 'id' => $taskModel->id,'language' => 'en'])) ?></li>
        <li>&nbsp;</li>
        <li><?= Html::a('ru', \yii\helpers\Url::to(['task/one', 'id' => $taskModel->id,'language' => 'ru'])) ?></li>
    </ul>
</div>

<?php
$this->title = 'Update Tasks: ' . $taskModel->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $taskModel->title;
$this->params['breadcrumbs'][] = Yii::t('app', 'update');

?>

<div class="task">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($taskModel, 'title')->textInput(['maxlength' => true]) ?>

    <div class="drop-lists">
        <?= $form->field($taskModel, 'creator_id')->dropDownList($users, ['prompt' => 'Select Creator']) ?>
        <?= $form->field($taskModel, 'executor_id')->dropDownList($users, ['prompt' => 'Select Executor']) ?>
        <?= $form->field($taskModel, 'status_id')->dropDownList($statuses, ['prompt' => 'Select Status']) ?>
    </div>

    <?= $form->field($taskModel, 'due_date')->textInput() ?>

    <?= $form->field($taskModel, 'description')->textarea(['maxlength' => true]) ?>

    <div class="form-group task-buttons">
        <?php $buttonName = Yii::t('app', 'update');
        echo Html::submitButton($buttonName, ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php $uploadForm = ActiveForm::begin([
        'action' => [
            'upload',
            'id' => $taskModel->id
        ],
    ]); ?>

    <?= $uploadForm->field($uploadModel, 'file')->fileInput(); ?>

    <div class="form-group task-buttons">
        <?php $buttonName = Yii::t('app', 'attach');
        echo Html::submitButton($buttonName, ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>


    <div class="task-files">
        <?php foreach ($taskModel->files as $file): ?>
            <a target="_blank" href="<?= $file->path; ?>"><img src="<?= $file->path_small; ?>" alt=""></a>
        <?php endforeach; ?>
    </div>

</div>
