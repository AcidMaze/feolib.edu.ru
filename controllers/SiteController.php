<?php

namespace app\controllers;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use app\models\EventImage;
use app\models\EventСertificatesList;

class SiteController extends Controller
{
   
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
        foreach(EventImage::find()->all() as $one){
            $image = base64_encode($one->img);
            $img_items [] =  
            [
                'content' => Html::tag('div', '', ['class' => 'main-img',  'style' => "background-image: url(data:image/jpg;base64,$image);"]),
                'caption' => '',
                'options' => [],
            ];
        }
        return $this->render('index', [
            'img_items' => $img_items
        ]);
    }  
    public function actionContacts()
    {
        return $this->render('contact');
    }

 
}
