<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Top;
use app\models\AddCity;

class SiteController extends Controller
{
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCity()
    {
        $getCity = Yii::$app->request->get('city');
        
        $city = Top::findOne($getCity);
        
        $city->views++;
        $city->save();
        
        return $this->render('city',[
            'city'=>$city,
            'getCity'=>$getCity,
        ]);
    }
    public function actionAddcity()
    {
        $form = new AddCity();
        if ($form->load(Yii::$app->request->post()) && $form->validate())
        {            
            $city = new Top;
            $city->title = $form->title;
            $form->img = UploadedFile::getInstance($form, 'img');
            $form->img->saveAs('image/city/'.$form->img->baseName.'.'.$form->img->extension);
            $city->img = $form->img->baseName.'.'.$form->img->extension;
            $city->about = $form->about;
            $city->date = time();
            $city->save();
            return  $this->refresh();
        }
        return $this->render('addcity',
                            ['form' =>$form]
                            );
    }

}
