<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Media */
/* @var $form ActiveForm */
?>
<div class="site-media">

    <h1>Upload Your Work</h1>
    <div class="alert alert-info">
        <p class="lead">Guide Lines</p>
        <ul>
            <li>If your work is digital, screenshots are required (pictures taking via phone or camera will not be accepted)</li>
            <li>Make sure you show only what is necessary</li>
            <li>Ensure the work you upload is at a professional standard</li>
            <li>The text you enter should be formatted correctly</li>
        </ul>
        <span style="font-weight: bold">Failing to do the above could result in your projects not being approved!</span>
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($text, 'title') ?>
        <?= $form->field($text, 'textCopy')->textArea(['rows' => '8']) ?>
        <?= $form->field($media, 'mediaImagePath')->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

    <?= Html::a('Go Back',  ['site/dashboard'], ['class' => 'btn btn-success']) ?>

</div><!-- site-media -->
