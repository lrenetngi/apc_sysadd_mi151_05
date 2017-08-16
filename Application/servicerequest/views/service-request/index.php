<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiceRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicerequest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Service Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model)
        {
            if($model->request_status == 'Done')
            {
                return['class' => 'success'];
            } else if($model->request_status == 'On Going')
            {
                return['class' => 'info'];
            } else if($model->request_status == 'Cancelled')
            {
                return['class' => 'danger'];
            } else if($model->request_status == 'High Priority')
            {
                return['class' => 'warning'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'request_title',
            //'request_details',
            //'request_category',
            'room_no',
            'request_status',
            'date_started',
            'date_finished',
            // 'hotelguest_id',
            // 'employee_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
