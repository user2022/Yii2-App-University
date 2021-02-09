<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TextCopy */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Text Copies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-copy-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->textCopyID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->textCopyID], [
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
            'textCopyID',
            'textCopy:ntext',
            'title',
        ],
    ]) ?>

</div>
