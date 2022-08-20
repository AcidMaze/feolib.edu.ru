<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Cookie;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use app\models\AddEvent;
use app\models\EditEvent;
use app\models\EventsList;
use app\models\EventСertificatesList;
use app\models\UsersList;
use app\models\EditUser;
use app\models\EventImage;

class AdminController extends Controller
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

    public function actionStatistics(){

        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $id = Yii::$app->request->get('id');
            $model = EventsList::find()->where('id = :id', [':id' => $id])->one();
            $dataProvider = new ActiveDataProvider([
                'query' => EventСertificatesList::find()->where('id_event = :id_event', [':id_event' => $id]),
            ]);
            return $this->render('statistics', [
                'model' => $model,
                'dataProvider' => $dataProvider
            ]);
        }
        else
        {
            return $this->redirect(['/']);
        }
    }

    public function actionUserlist(){
        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $dataProvider = new ActiveDataProvider([
                'query' => UsersList::find(),
            ]);
            return $this->render('userlist', [
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            return $this->redirect(['/']);
        }
    }

    public function actionIndex(){
        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $dataProvider = new ActiveDataProvider([
                'query' => EventsList::find(),
            ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
        else
        {
            return $this->redirect(['/']);
        }
    }

    public function actionDelete(){
        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $id = Yii::$app->request->get('id');
            $model = EventsList::find()->where('id = :id', [':id' => $id])->one();
            if($model)
            {
                $model->delete();
                return $this->redirect(['index']);
            }
            else{
                return $this->redirect(['index']);
            }
        }
        else
        {
            return $this->redirect(['/']);
        }
    }

    public function actionDeleteuser(){
        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $id = Yii::$app->request->get('id');
            $model = UsersList::find()->where('id = :id', [':id' => $id])->one();
            if($model)
            {
                $model->delete();
                return $this->redirect(['userlist']);
            }
            else{
                return $this->redirect(['index']);
            }
        }
        else
        {
            return $this->redirect(['/']);
        }
    }

    public function actionEdituser()
    {
        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $id = Yii::$app->request->get('id');
            $model = EditUser::find()->where('id = :id', [':id' => $id])->one();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) 
            {
                $model->name = $model->name;
                $model->phone = $model->phone;
                $model->email = $model->email;
                $model->address = $model->address;
                $model->age_date = $model->age_date;
                $model->passport = $model->passport;
                $model->save();
                return $this->redirect(['userlist']);
            } 
            return $this->render('edituser', ['model' => $model]);
        }
        else
        {
            return $this->redirect(['/']);
        }
    }

    public function actionUpdate()
    {
        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $id = Yii::$app->request->get('id');
            $model = EditEvent::find()->where('id = :id', [':id' => $id])->one();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) 
            {
                $model->title = $model->title;
                $model->place = $model->place;
                $model->text = $model->text;
                $model->date = $model->date;
                $model->status = $model->status;
                $model->save();
                return $this->redirect(['index']);
            } 
            return $this->render('update', ['model' => $model]);
        }
        else
        {
            return $this->redirect(['/']);
        }
    }
    public function actionAdd(){
        $admin = new UsersList;
        if($admin->isAdmin(Yii::$app->request->cookies->getValue('uniqueID')))
        {
            $model = new AddEvent();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) 
            {
                $file = \yii\web\UploadedFile::getInstance($model, 'imageFile');
                $fp = fopen($file->tempName, 'r');
                $file = fread($fp, $file->size);
                fclose($fp);
                $model->title = $model->title;
                $model->place = $model->place;
                $model->text = $model->text;
                $model->date = $model->date;
                $model->status = $model->status;
                $model->title_img = $file;
                $model->save();
                return $this->redirect(['index']);
            } 
            return $this->render('add', ['model' => $model]);
        }
        else
        {
            return $this->redirect(['/']);
        }
    }
}
