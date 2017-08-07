<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Servicerequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicerequest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'request_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'room_no')->textInput(['style' => 'width:200px']) ?>

    <?= $form->field($model, 'assigned_to')->dropDownList(['Employee #1' => 'Employee #1', 'Employee #2' => 'Employee #2'], ['style'           => 'width:200px']) ?>

    <?= $form->field($model, 'date')->widget(
                    DateTimePicker::className(), [
                        'options' => ['placeholder' => 'Render Time'],
                        'pluginOptions' => [
                        'autoclose' => true,
                        ]  
        ])?>

    <?= $form->field($model, 'request_status')->dropDownList(['On Going!' => 'On Going!', 'Done!' => 'Done!', 'Cancelled!' => 'Cancelled!', 'High Priority!' => 'High Priority!'], ['style' => 'width:200px']) ?>

    <div class="form-group">

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
