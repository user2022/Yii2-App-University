<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style>
    .banner1 {
        background-image: url("https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/banner");
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 400px;

        position: absolute;
        top: 50px;
        left: 0;

        z-index: -1;
    }

    .mTitle {
        color: #ffffff !important;
        text-shadow: 4px 3px 0 #981026;
    }

    body {
        background-color: #3b3f44;
        color: white !important;
    }

    .homeBody {
        background-image:url("https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/128-184");
        background-repeat:repeat;
    }
</style>
<body class="homeBody">
<div class="site-index">
    <div class="jumbotron">
        <h1 class="mTitle">Welcome To EXPOTEES</h1>

        <p class="lead">Click the button below to get started with uploading your work</p>

        <p><?= Html::a('Dashboard',  ['site/dashboard'], ['class' => 'btn btn-success']) ?></p>

        <p class="lead">Not signed up? <?= Html::a('Click here to register',  ['site/signup']) ?></p>
        <!--        <img src="https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/expo" style="max-height: 400px" /> put across top graysale-->
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>What is Expotees?</h2>

                <p>ExpoTees is our 14th annual exhibition of outstanding
                    computing innovation, technology and design – and an
                    opportunity to recruit bright, new talent to your organisation.</p>

            </div>
            <div class="col-lg-4">
                <h2>Get Started</h2>

                <p>Are you a final year student looking to showcase your work? Get started by registering
                    an account and heading over to your dashboard. There you will find instructions on
                    how to upload your work and profile picture.</p>
            </div>
            <div class="col-lg-4">
                <h2>Why Should I do this?</h2>

                <p>ExpoTees is a great way to show off your work and projects to other businesses and
                    companies. The work you upload will be placed into a brochure and showcased to employers and
                    businesses around the world.</p>
            </div>
        </div>

    </div>
</div>
</body>

