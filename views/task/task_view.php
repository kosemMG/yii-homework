<?php

/**
 * @var \app\models\tables\Tasks $model
 * @var array $statuses
 * @var array $users
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = $model->title;

$this->title = 'Update Tasks: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

?>

<div class="task">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="drop-lists">
        <?= $form->field($model, 'creator_id')->dropDownList($users, ['prompt' => 'Select Creator']) ?>
        <?= $form->field($model, 'executor_id')->dropDownList($users, ['prompt' => 'Select Executor']) ?>
        <?= $form->field($model, 'status_id')->dropDownList($statuses, ['prompt' => 'Select Status']) ?>
    </div>


    <?= $form->field($model, 'due_date')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>