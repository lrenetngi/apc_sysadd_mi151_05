<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hotelguest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hotelguest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guest_lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guest_firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guest_contactno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guest_email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
