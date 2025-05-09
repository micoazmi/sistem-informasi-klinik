<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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

        $model->password = '';
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

    public function actionAdmin()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'admin') {
            throw new \yii\web\ForbiddenHttpException('Hanya admin yang bisa mengakses halaman ini.');
        }
    
        return $this->render('admin');
    }
    public function actionDokter()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'dokter') {
            throw new \yii\web\ForbiddenHttpException('Hanya dokter yang bisa mengakses halaman ini.');
        }
    
        return $this->render('dokter');
    }
    public function actionKasir()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'kasir') {
            throw new \yii\web\ForbiddenHttpException('Hanya kasir yang bisa mengakses halaman ini.');
        }
    
        return $this->render('kasir');
    }
    public function actionPendaftaran()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 'daftar') {
            throw new \yii\web\ForbiddenHttpException('Hanya Petugas Pendaftaran yang bisa mengakses halaman ini.');
        }
    
        return $this->render('pendaftaran');
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
}
