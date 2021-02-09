<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\helpers\ArrayHelper;
use app\models\Projects;

/* @var $this yii\web\View */
/* @var $model app\models\Projects */

$this->title = $model->projectID;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->projectID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->projectID], [
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
            'projectID',
            'userID',
            'textCopyID',
            'mediaID',
            'approvedStatusID',
            'eventApprovalID',
        ],
    ]);

    $projects = Projects::find($model->projectID)->with('data')->asArray()->all();
    $projects1 = Projects::find($model->projectID)->with('text')->asArray()->all();


    $mediaArray = ArrayHelper::index($model->data, 'mediaID');
    $textArray = ArrayHelper::index($model->text, 'textCopyID');

    echo Html::tag('h2', Html::encode('All Images For This Property'), ['class' => 'props']);
    foreach($mediaArray as $projectImg) {
        echo Html::img(Yii::getAlias('@web') . '/' . $projectImg->mediaImagePath, ['alt' => 'project_img', 'width' => '300']);
    }

    echo Html::tag('h2', Html::encode('All Text For This Property'), ['class' => 'props']);
    foreach($textArray as $projectTxt) {
        echo '<span class="border border-primary">';
        echo Html::tag('h4', 'Title: '.Html::encode($projectTxt->title), ['style' => 'font-weight: bold']);
        echo '<br>';
        echo Html::tag('h4', 'Text: '.Html::encode($projectTxt->textCopy));
        echo '</span>';
    }
    ?>

</div>
