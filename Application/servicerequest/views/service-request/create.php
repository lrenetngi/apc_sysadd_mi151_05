<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Servicerequest */

$this->title = 'Create Servicerequest';
$this->params['breadcrumbs'][] = ['label' => 'Servicerequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicerequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
