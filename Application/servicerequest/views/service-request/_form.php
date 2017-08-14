<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicerequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicerequest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'request_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'room_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_started')->textInput() ?>

    <?= $form->field($model, 'date_finished')->textInput() ?>
    
    <?= $form->field($model, 'employee_id')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

 <?php ActiveForm::end(); ?>

</div>
