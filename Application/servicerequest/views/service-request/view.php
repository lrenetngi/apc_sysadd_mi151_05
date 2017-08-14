<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Servicerequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Servicerequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicerequest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'request_title',
            'request_details',
            'request_category',
            'room_no',
            'request_status',
            'date_started',
            'date_finished',
            'hotelguest_id',
            'employee_id',
        ],
    ]) ?>

</div>
