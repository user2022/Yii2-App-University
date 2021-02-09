<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventApproval */

$this->title = 'Create Event Approval';
$this->params['breadcrumbs'][] = ['label' => 'Event Approvals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-approval-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
