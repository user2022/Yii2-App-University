<?php
use yii\helpers\Html;
?>
<h2>Registration Successful!</h2>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->firstName) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->emailAddress) ?></li>
</ul>