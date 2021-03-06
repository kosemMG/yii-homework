<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
/* @var array $items */
/* @var array $users */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creator_id')->dropDownList($users, ['prompt' => 'Select Creator']) ?>

    <?= $form->field($model, 'executor_id')->dropDownList($users, ['prompt' => 'Select Executor']) ?>

    <?= $form->field($model, 'due_date')->textInput() ?>

    <?= $form->field($model, 'status_id')->dropDownList($items, ['prompt' => 'Select Status']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
