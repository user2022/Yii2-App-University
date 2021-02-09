<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>

</style>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $null = false;
    NavBar::begin([
        'brandLabel' => '<div class="row"><img style="width: 30px; height: 30px;" src="https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/logo"> EXPOTEES</div>'
,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            ['label' => 'Home', 'url' => ['/site/index']],



            Yii::$app->user->isGuest ? (
                    ['label' => 'Signup', 'url' => ['/site/signup']] // Displays signup if user is guest
            ) : (
            ['label' => 'Dashboard', 'url' => ['/site/dashboard']] // Displays the dashboard navigation option if user is logged in

            ),

            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->emailAddress . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),

            Yii::$app->user->isGuest ? (
            ['label' => ' ', 'url' => ['#'], 'visible' => $null = false] // Had a problem where I had to place something here or it wouldn't work
                // so put an empty label that won't show
            ) : (
            ['label' => 'Admin', 'url' => ['/site/admin'], 'visible' => Yii::$app->user->identity->role === 'admin']

            ),

        ],
    ]);
    NavBar::end();
    // ['label' => 'Admin', 'url' => ['/site/admin'], 'visible' => Yii::$app->user->identity->role = 'admin']
    ?>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>

    </div>

    <?php
    


    ?>

</div>
<style>
    .mFooter {
        background-color: #292929;
        border-top-color: #48444a;
    }

    .footerTxt {
        color: white;
    }
</style>

<footer class="footer mFooter">
    <div class="container">
        <p class="pull-left footerTxt">&copy; Teesside University <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
