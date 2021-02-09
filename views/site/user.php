<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Projects;
use yii\controllers\ProjectsController;
use yii\models\Media;

use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
$this->title = 'User';

?>
<style>
    .nAlert {
        width: 50%;
        margin: 30px auto auto auto;
    }

    .nBtn {
        margin-top: 15px;
    }
</style>
<div class="site-index">
    <?= Html::a('Go Back',  ['site/admin'], ['class' => 'btn btn-success']) ?>
    <?php //echo $userID ;
    //echo $profile->firstName;
    ?>
    <h1 class="text-center">You are currently viewing: <?php echo $profile->firstName. ' '. $profile->lastName ?>'s project(s)</h1>
    <div class="row text-center">
        <div class="" style="background-color: white; border-radius: 10px; padding: 20px;">
            <?php
            echo '<div class="alert alert-info">Refresh the page after Approving</div>';
            if (count($projects) !== 0) {
                for ($i = 0; $i < count($projects); $i++) {
                    echo Html::tag('h3', Html::encode($arTitle[$i]));
                    echo Html::tag('p', Html::encode($arText[$i]));
                    echo Html::img('/EXPOTEES/basic/web/'. $arMedia[$i], ['style' => 'max-width: 650px;height:400px;border-radius:10px;margin-top:15px;']);
                    $form = ActiveForm::begin([
                        'id' => 'form-id'
                    ]);
                    echo Html::submitButton('Approve', ['class' => 'btn btn-success nBtn']);
                    ActiveForm::end();
                    if ($arAprv[$i] == 1) {
                        echo '<div class="alert alert-danger nAlert">This project has not been approved</div>';
                    } else {
                        echo '<div class="alert alert-success nAlert">Congratulations this project has been approved!</div>';
                    }
                    echo '<hr style="border-top-color: #adadad">';
                }
            } else {
                echo Html::tag('div', Html::encode('You have not uploaded any projects!'), ['class' => 'alert alert-warning']) ;
            }
            ?>
        </div>
    </div>
</div>
