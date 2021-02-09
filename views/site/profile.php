<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Media */
/* @var $form ActiveForm */
?>
<div class="site-profile">
    <h1>Upload Your Profile Picture</h1>
    <div class="alert alert-info">
        <p class="lead">Guide Lines</p>
        <ul>
            <li>Clear Background</li>
            <li>Nothing covering your face (no hats, glasses etc.)</li>
            <li>Look professional</li>
            <li>Most importantly, smile!</li>
        </ul>
        <span style="font-weight: bold">Failing to do the above could result in your projects not being approved!</span>
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($profile, 'profileImagePath')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

    <?= Html::a('Go Back',  ['site/dashboard'], ['class' => 'btn btn-success']) ?>

</div><!-- site-profile -->
