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
    .mTable {
        font-size: 18px;
    }

    .mAlert {
        margin-top: 50px;
    }
</style>
<div class="site-index">
    <div class="text-center">
        <h1>Admin Panel</h1>
        <div class="container">
            <div class="row">
                <div class="mAlert alert alert-info">
                    <h3>Information</h3>
                    <p>Welcome to the admin panel. Here you can moderate and approve the work that users have uploaded. To get
                        started click on a user in the table by their first name and it will show you their work. You should then
                        check if it matches the criteria and is suitable to be shown in our EXPOTEES leaflet. If it does, press
                        the approved button, if it doesn't leave it empty and email the student about what they should improve upon.</p>
                </div>
                <h2>List of Users</h2>
                <table class="table table-striped table-dark table-bordered mTable">
                    <tr>
                        <thead class="">
                        <th class="text-center">First Name</th>
                        <th class="text-center">Last Name</th>
                        <th class="text-center">Email</th>
                        </thead>
                    </tr>
                    <?php foreach ($userList as $item) {
                        echo '<tr><td><a href="/EXPOTEES/basic/web/index.php/site/user?id='.$item->userID.'">' . $item->firstName . '</a></td><td>'. $item->lastName .'</td><td>'. $item->emailAddress .'</td></tr>';
                    } ?>
                </table>
            </div>
        </div>


    </div>
</div>
