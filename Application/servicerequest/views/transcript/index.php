<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TranscriptModel */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transcripts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transcript-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transcript', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ticket_id',
            'ticket_item_id',
            'emp_resp_id',
            'dept_resp_id',
            // 'description:ntext',
            // 'time',
            // 'ticket_id1',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
