<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApprovedStatus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approved-status-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'approved')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
