<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\Employee;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'request_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownlist(['On Going' => 'On Going', 'Done' => 'Done', 'High Priority' => 'High Priority',
                                                            'Cancelled' => 'Cancelled'], ['style' => 'width:200px']) ?>

    <?= $form->field($model, 'time_start')->widget(DateTimePicker::className(),
                                            [
                                                'value' => date('d-m-y h:i:s'),
                                                'disabled' => true
                                            ]

    ); ?>


    <?= $form->field($model, 'time_end')->widget(DateTimePicker::className(), 
                                        [
                                            'value' => date('d-m-y h:i:s'),
                                            'disabled' => true,

                                        ]
                               
                                
    ); ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'employee_respond_id')->dropDownlist(
                                    ArrayHelper::map(Employee::find()->all(), 'id', 'id'),
                                    [
                                        'prompt' => 'Select Employee ID',
                                        'style' => 'width:200px'
                                    ]
    ); ?>

    <?= $form->field($model, 'category')->dropDownlist(['Housekeeping' => 'Housekeeping', 'Engineering' => 'Engineering', 'Food and Beverages' => 'Food and Beverages'], ['style' => 'width:200px']) ?>
                            


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
