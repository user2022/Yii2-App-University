<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovedStatus */

$this->title = 'Update Approved Status: ' . $model->approvedStatusID;
$this->params['breadcrumbs'][] = ['label' => 'Approved Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->approvedStatusID, 'url' => ['view', 'id' => $model->approvedStatusID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="approved-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
