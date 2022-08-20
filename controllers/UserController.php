<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Cookie;
use yii\data\Pagination;
use app\models\UsersRegister;
use app\models\UsersLogin;
use app\models\UsersList;
use app\models\EventСertificatesList;
use app\models\EventsList;
use app\models\EditUser;
use yii\helpers\Html;

class UserController extends Controller
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
    //Регистрация
    public function actionReg() {
        
        $model = new UsersRegister();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $model->name = $model->name;
            $model->sex = $model->sex;  
            $model->phone = $model->phone; 
            $model->passport = $model->passport;
            $model->email = $model->email;
            $model->password = $model->password; 
            $model->save();
            return $this->redirect(['auth']);
        } 
        else 
        {
            return $this->render('reg', ['model' => $model]);
        }
    }
    //Авторизация
    public function actionAuth() {
        
        $model = new UsersLogin();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model = UsersLogin::find()->where('email = :email AND password = :password', [':email' => $model->email,':password' => $model->password])->one();
            $cookies = Yii::$app->request->cookies;
            if (!$cookies->has('uniqueID')) {
                $cookies = Yii::$app->response->cookies;
                $cookies->add(new Cookie(
                    [
                        'name' => 'uniqueID',
                        'value' => $model->id,
                    ]
                ));
                $session = Yii::$app->session;
                $session->open();
                $users = new UsersList;
                $users->setUserInfo($model);
                return $this->redirect(['user-profile']);
            } 
            else {
                $value = $cookies->get('uniqueID');
            }
        } 
        else {

            return $this->render('auth', ['model' => $model]);
        }
    }
    //Выход пользователя
    public function actionSignout()
    {
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID'))
        {
            $cookies = Yii::$app->response->cookies;
            $cookies->remove('uniqueID');
            $session = Yii::$app->session;
            if ($session->isActive)
            {
                $session->remove('user');
            }
            return $this->redirect(['/']);
        }
        else
        {
            return $this->redirect(['auth']);
        }
    }

    //Профиль
    public function actionUserProfile()
    {
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID')){
            $uniqueID = $cookies->getValue('uniqueID');
            $user = UsersList::find()->where('id = :id', [':id' => $uniqueID])->one();
            $query = EventСertificatesList::find()->where('id_user = :id', [':id' => $uniqueID]);
            $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $models = $query->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('user-profile',
            [
                'user' => $user,
                'pages' => $pages,
                'models' => $models
            ]);
        }
        else{
            return $this->redirect(['auth']);
        }
    }

    //Редактированеи профиля
    public function actionEditprofile() {
        
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID'))
        {
            $uniqueID = $cookies->getValue('uniqueID');
            $model = EditUser::find()->where('id = :id', [':id' => $uniqueID])->one();
            if($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->name = $model->name;
                $model->sex = $model->sex;
                $model->phone = $model->phone;
                $model->email = $model->email;
                $model->address = $model->address;
                $model->age_date = $model->age_date;
                $model->passport = $model->passport;
                $model->save();
                return $this->redirect(['user-profile']);
            }
            else 
            {
                return $this->render('editprofile', ['model' => $model]);
            }
        }
    }  


    public function actionChangeimg() {
        
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID'))
        {
            $uniqueID = $cookies->getValue('uniqueID');
            $model = EditUser::find()->where('id = :id', [':id' => $uniqueID])->one();
            if($model->load(Yii::$app->request->post()) && $model->validate()) {
                $file = \yii\web\UploadedFile::getInstance($model, 'userImgFile');
                if(!empty($file))
                {
                    $fp = fopen($file->tempName, 'r');
                    $file = fread($fp, $file->size);
                    fclose($fp);
                    $model->img = $file;
                    $model->save();
                    return $this->redirect(['user-profile']);
                }
                else{
                    return $this->redirect(['user-profile']);
                }
            }
            else 
            {
                return $this->render('changeimg', ['model' => $model]);
            }
        }
    }  

    public function actionSertificate(){
        $id_evt = Yii::$app->request->get('id');
        $event = EventsList::find()->where('id = :id', [':id' => $id_evt])->one();
        return $this->render('sertificate', ['event' => $event, 'serfid' => Yii::$app->request->get('serfid')]);
    }
}
