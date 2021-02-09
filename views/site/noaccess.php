<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Projects;
use yii\controllers\ProjectsController;
use yii\models\Media;
use yii\base\Widget;


/* @var $this yii\web\View */
$this->title = 'No Access';
?>

<div class="site-index">
    <div class="container">
        <div class="alert alert-danger">
            <h2>Access Denied</h2>
            <p>This page is visible by administrators only!</p>
        </div>
    </div>
</div>
