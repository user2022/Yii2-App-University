<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'firstName')->textInput(['autofocus' => true])->hint('Enter your first name')->label('First Name') ?>
        <?= $form->field($model, 'lastName')->hint('Enter your last name') ?>
        <?= $form->field($model, 'emailAddress')->hint('Enter your email address')->input('email') ?>
        <?= $form->field($model, 'passWord')->passwordInput()->hint('Make sure your password is hard to guess') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-signup -->
