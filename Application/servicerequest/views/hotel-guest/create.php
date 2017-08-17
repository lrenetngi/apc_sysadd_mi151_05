<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hotelguest */

$this->title = 'Create Hotelguest';
$this->params['breadcrumbs'][] = ['label' => 'Hotelguests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hotelguest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
