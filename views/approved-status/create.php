<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApprovedStatus */

$this->title = 'Create Approved Status';
$this->params['breadcrumbs'][] = ['label' => 'Approved Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approved-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
