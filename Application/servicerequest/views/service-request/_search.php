<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceRequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicerequest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'request_title') ?>

    <?= $form->field($model, 'request_details') ?>

    <?= $form->field($model, 'room_no') ?>

    <?= $form->field($model, 'assigned_to') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'request_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
