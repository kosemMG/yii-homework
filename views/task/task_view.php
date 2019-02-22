<?php

/**
 * @var \app\models\tables\Tasks $taskModel
 * @var \app\models\Upload $uploadModel
 * @var array $statuses
 * @var array $users
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Update Tasks: ' . $taskModel->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $taskModel->title;
$this->params['breadcrumbs'][] = 'Update';

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
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
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
        <?= Html::submitButton('Attach', ['class' => 'btn btn-success']); ?>
    </div>

    <?php ActiveForm::end(); ?>


    <div class="task-files">
        <?php foreach ($taskModel->files as $file): ?>
            <a target="_blank" href="<?= $file->path; ?>"><img src="<?= $file->path_small; ?>" alt=""></a>
        <?php endforeach; ?>
    </div>

</div>
