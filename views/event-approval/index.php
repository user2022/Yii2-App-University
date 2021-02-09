<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventApprovalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event Approvals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-approval-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event Approval', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'eventApprovalID',
            'eventApproved',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
