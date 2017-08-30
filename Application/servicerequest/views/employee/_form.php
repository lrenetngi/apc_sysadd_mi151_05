<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_id')->dropDownlist(
                                                ArrayHelper::map(Department::find()->all(), 'id', 'id'),
                                                [
                                                    'prompt' => 'Select Department ID',
                                                    'style' => 'width:200px'
                                                ]); ?>

    <?= $form->field($model, 'status')->dropDownlist(['Available' => 'Available', 'On Going' => 'On Going', 'Absent' => 'Absent'],
                                                                ['style' => 'width:200px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
