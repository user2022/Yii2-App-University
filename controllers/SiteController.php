<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

use app\models\Media;
use app\models\TextCopy;
use app\models\Users;
use app\models\Projects;
use app\models\Profile;
use app\models\ApprovedStatus;

use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpload() {
        $model = new Users();
        $media = new Media();
        $textCopy = new TextCopy();


    }

    public function actionEntry() {

    }

    public function signup() {
        if(!$this->validate()) {
            return null;
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays signup page.
     *
     * @return string
     */
    public function actionSignup()
    {


        $model = new Users();

        if ($model->load(Yii::$app->request->post())) {

            //print "test";

            //&& $model->validate()
            // This will mean $model received valid data
            $model->authKey="12345a";
            $model->role='user';
            $model->Save();

            return $this->render('index');

        } else {
            return $this->render('signup', ['model' => $model]);
        }

    }

    public function actionDashboard() {
        $model = new Projects();
        $profileImg = new Media();
        $profile = Profile::find()->where(['userID' => Yii::$app->user->identity->userID])->one();


        if ($profile === null) {
            $profile === 'https://t7230883.scedt.tees.ac.uk/EXPOTEES/basic/web/img/profile';
        }

        $profileImg = Media::find()->where(['mediaID' => 2])->one();
        $projects = Projects::find()->where(['userID' => Yii::$app->user->identity->userID])->all();
        if ($projects !== null) {
            $arMedia = [];
            $arTitle = [];
            $arText = [];
            $arAprv = [];
            foreach($projects as $val) {

                $aprvID = $val->approvedStatusID;
                $mediaID = $val->mediaID;
                $textID = $val->textCopyID;

                $approved = ApprovedStatus::find()->where(['approvedStatusID' => $aprvID])->one();
                $mediaImg = Media::find()->where(['mediaID' => $mediaID])->one();
                $txt = TextCopy::find()->where(['textCopyID' => $textID])->one();

                array_push($arMedia, $mediaImg->mediaImagePath);
                array_push($arTitle, $txt->title);
                array_push($arText, $txt->textCopy);
                array_push($arAprv, $approved->approved);
            }

        } else {
            $mediaImg = 'No project found';
            $txt = 'No project found';
        }

        if (Yii::$app->user->isGuest) {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            }
            return $this->render('login', [
                'model' => $model,
            ]);
        } else {

            return $this->render('dashboard', [
                'profileImg' => $profileImg,
                'projects' => $projects,
                'arMedia' => $arMedia,
                'arText' => $arText,
                'arTitle' => $arTitle,
                'profile' => $profile,
                'arAprv' => $arAprv
            ]);
        }
    }

    public function actionProfile() {
        $profile = new Profile();
        if ($profile->load(Yii::$app->request->post())) {
            $profile->userID = Yii::$app->user->identity->userID;

            $profile->profileImagePath = UploadedFile::getInstance($profile, 'profileImagePath');
            $profile->profileImagePath->saveAs('/web/users/t7230883/EXPOTEES/basic/web/uploads/profile/' . $profile->profileImagePath->baseName . '.' . $profile->profileImagePath->extension);

            $profile->profileImagePath = "uploads/profile/".$profile->profileImagePath->baseName . '.' . $profile->profileImagePath->extension;

            if ($profile->validate()) {
                $profile->Save();

            }
        }


        return $this->render('profile', [

            //send the models to the view
            'profile' => $profile
        ]);
    }

    public function actionMedia() {
        $media = new Media();
        $text = new TextCopy();
        $project = new Projects();
        $approveStatus = new ApprovedStatus();

        $approveStatus->approved = 1;


        if ($media->load(Yii::$app->request->post()))  {
            $media->mediaType = 2;
            $media->mediaImagePath = UploadedFile::getInstance($media, 'mediaImagePath');
            $media->mediaImagePath->saveAs('/web/users/t7230883/EXPOTEES/basic/web/uploads/' . $media->mediaImagePath->baseName . '.' . $media->mediaImagePath->extension);

            $media->mediaImagePath = "uploads/".$media->mediaImagePath->baseName . '.' . $media->mediaImagePath->extension;

            if ($media->validate()) {
                $media->Save();
                $approveStatus->Save();

            }
        }

        if ($text->load(Yii::$app->request->post()))  {

            if ($text->validate()) {
                $text->Save();
            }

            $project->userID = Yii::$app->user->identity->userID;
            $project->mediaID = $media->mediaID;
            $project->textCopyID = $text->textCopyID;
            $project->approvedStatusID = $approveStatus->approvedStatusID;
            $project->eventApprovalID = 1;

            $project->Save();



        }




        return $this->render('media', [

            //send the models to the view
            'media' => $media, 'text' => $text,
        ]);
    }



    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    // $profile = Profile::find()->where(['userID' => Yii::$app->user->identity->userID])->one();
    public function actionAdmin() {

        if (Yii::$app->user->identity->role === 'user') {
            return $this->render('noaccess');
        } else {
            $users = new Users();

            $userList = Users::find()->orderBy('firstName')->all();


            return $this->render('admin', [
                'userList' => $userList
            ]);
        }


    }

    public function actionUser() {
        $userID = Yii::$app->request->get('id');
        $profile = Users::find()->where(['userID' => $userID])->one();


        $projects = Projects::find()->where(['userID' => $userID])->all();
        if ($projects !== null) {
            $arMedia = [];
            $arTitle = [];
            $arText = [];
            $arAprv = [];
            foreach($projects as $val) {

                $aprvID = $val->approvedStatusID;
                $mediaID = $val->mediaID;
                $textID = $val->textCopyID;

                $mediaImg = Media::find()->where(['mediaID' => $mediaID])->one();
                $txt = TextCopy::find()->where(['textCopyID' => $textID])->one();
                $approved = ApprovedStatus::find()->where(['approvedStatusID' => $aprvID])->one();

                array_push($arMedia, $mediaImg->mediaImagePath);
                array_push($arTitle, $txt->title);
                array_push($arText, $txt->textCopy);
                array_push($arAprv, $approved->approved);

                if (Yii::$app->request->post()) {
                    $approved->approved = 2;
                    $approved->Save();
                }
            }

        } else {
            $mediaImg = 'No project found';
            $txt = 'No project found';
        }

        return $this->render('user', [
            'userID' => $userID,
            'profile' => $profile,
            'projects' => $projects,
            'arMedia' => $arMedia,
            'arText' => $arText,
            'arTitle' => $arTitle,
            'arAprv' => $arAprv
        ]);
    }
}
