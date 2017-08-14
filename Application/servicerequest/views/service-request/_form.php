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

    <?= $form->field($model, 'request_details')->textArea(['rows' => 6]) ?>

    <?= $form->field($model, 'request_category')->dropDownList(['Room Inspection' => 'Room Inspection', 'Housekeeping' => 'Housekeeping'], ['style' => 'width:200px']) ?>

    <?= $form->field($model, 'room_no')->textInput(['style' => 'width:200px']) ?>

    <?= $form->field($model, 'request_status')->dropDownList(['On Going' => 'On Going', 'Done' => 'Done', 'Cancelled' => 'Cancelled', 'High Priority' => 'High Priority'], ['style' => 'width:200px']) ?>

    <?= $form->field($model, 'date_started')->widget(
                        DateTimePicker::className(), [
                        'options' => ['placeholder' => 'Render Time'],
                        'pluginOptions' => [
                        'autoclose' => true,
                        ]
                    ])?>

    <?= $form->field($model, 'date_finished')->widget(
                    DateTimePicker::className(), [
                    'options' => ['placeholder' => 'Render Finished'],
                    'pluginOptions' => [
                    'autoclose' => true,
                    ]
        ])?>

    <?= $form->field($model, 'hotelguest_id')->textInput() ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
