<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hotelguest */

$this->title = 'Update Hotelguest: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hotelguests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hotelguest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
