<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Shift */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shift-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sched_start')->widget(
    						 DateTimePicker::className(), [
    						 	'options' => ['placeholder' => 'Time in'],
    						 	'pluginOptions' => [
    						 	'autoclose' => true,
    						 	]
    						 ]
    ) ?>

    <?= $form->field($model, 'sched_end')->widget(
    						 DateTimePicker::className(), [
    						 'options' => ['placeholder' => 'Time Out'],
    						 'pluginOptions' => [
    						 'autoclose' => true,
    						 ]
    						]
    ) ?>

    <?= $form->field($model, 'department_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supervisor')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
