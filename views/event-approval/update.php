<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventApproval */

$this->title = 'Update Event Approval: ' . $model->eventApprovalID;
$this->params['breadcrumbs'][] = ['label' => 'Event Approvals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eventApprovalID, 'url' => ['view', 'id' => $model->eventApprovalID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-approval-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
