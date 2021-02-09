<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Projects;
use yii\controllers\ProjectsController;
use yii\models\Media;
use yii\base\Widget;


/* @var $this yii\web\View */
$this->title = 'EXPOTEES Hub';

?>
<style>
    .nAlert {
        width: 50%;
        margin: 30px auto auto auto;
    }
</style>
<div class="site-index">
    <div class="text-center">
        <img style="width: 120px; height: 120px;" class="rounded" src="https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/logo">
    </div>
    <div class="jumbotron" style="margin-bottom: 0; padding-top: 10px; padding-bottom: 10px">
        <h1>Welcome, <?= \Yii::$app->user->identity->firstName ?></h1> <!-- Displays users first name to greet them -->
    </div>
    <div class="text-center">
<!--        <img style="border-radius: 100%; max-width: 150px; max-height: 150px" src="https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/profile">-->
        <?php if($profile !== null) {
            echo Html::img('/EXPOTEES/basic/web/'. $profile->profileImagePath, ['style' => 'border-radius: 100%; max-width: 150px; max-height: 150px;']);
        } else {
            echo Html::img('/EXPOTEES/basic/web/img/profile', ['style' => 'border-radius: 100%; max-width: 150px; max-height: 150px;']);
        }
         ?>
        <p> <?= Html::a('Click here to change your profile picture', ['site/profile'], ['style' => 'padding-top: 6px;']) ?> </p>
    </div>
    <hr> <!-- Profile image detail section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="text-center" style="font-size: 17px">Welcome to your EXPOTEES hub page. If you haven't already please take the time to upload
                a profile image which can be done so by clicking the URL below the default profile image. Please make sure your profile image is at
                 a professional standard! (Clear background, no hats, masks, sunglasses etc.)</p>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <img style="width: 40%; height: 40%" class="img-fluid" src="https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/expocomp">
                </div>
            </div>
        </div>
        <hr> <!-- Screen shot upload section -->
        <div class="row">
            <div class="col-md-6">
                <p class="text-center" style="font-size: 17px">Click the button below this to begin uploading your work. Follow the instructions on
                    the form and please make sure the screenshots are uploaded as images. </p>
                <div class="text-center">
                    <?= Html::a('Upload Your Project',  ['site/media'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <img style="width: 40%; height: 40%" class="img-fluid" src="https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/expocomp2">
                </div>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <h1 class="display-1">Your Projects</h1>
            <div class="" style="background-color: #eaecec; border: #bdc1c6 1px solid; border-radius: 10px; padding: 20px;">
            <?php
            if (count($projects) !== 0) {
                for ($i = 0; $i < count($projects); $i++) {
                    echo Html::tag('h3', Html::encode($arTitle[$i]));
                    echo Html::tag('p', Html::encode($arText[$i]));
                    echo Html::img('/EXPOTEES/basic/web/'. $arMedia[$i], ['style' => 'max-width: 650px;height:400px;border-radius:10px;margin-top:15px;']);
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
</div>

