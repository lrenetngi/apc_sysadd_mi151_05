<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use app\models\Employee;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'request_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_start')->widget(
                             DateTimePicker::className(), [
                                'options' => ['placeholder' => 'Time Started'],
                                'pluginOptions' => ['autoclose' => true,]
                             ]
    ) ?>

    <?= $form->field($model, 'time_end')->widget(
                              DateTimePicker::className(), [
                              'options' => ['placeholder' => 'Time Ended'],
                              'pluginOptions' => ['autoclose' => true,]
                              ]

    ) ?>


    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'employee_respond_id')->dropDownlist(
                                    ArrayHelper::map(Employee::find()->all(), 'id', 'id'),
                                    [
                                      'prompt' => 'Select Employee',
                                      'style' => 'width:250px'
                                    ]
    ); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
