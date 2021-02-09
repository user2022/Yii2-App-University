<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApprovedStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approved Statuses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approved-status-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Approved Status', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'approvedStatusID',
            'approved',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
