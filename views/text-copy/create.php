<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TextCopy */

$this->title = 'Create Text Copy';
$this->params['breadcrumbs'][] = ['label' => 'Text Copies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-copy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
