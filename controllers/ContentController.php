<?php
namespace app\controllers;
use Yii;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\EventsList;
use app\models\EventImage;


class ContentController extends Controller
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
    public function actionEvents()
    {
        $filter = Yii::$app->request->get('filter');
        if($filter == null) $query = EventsList::find()->orderBy(['date' => SORT_DESC]);
        else if($filter == 1) $query = EventsList::find()->where('status = :status', [':status' => 1]);
        else if($filter == 2) $query = EventsList::find()->orderBy(['date' => SORT_DESC]);
        else if($filter == 3) $query = EventsList::find()->orderBy(['date' => SORT_ASC]);
        else if($filter == 4) $query = EventsList::find()->where('status = :status', [':status' => 2]);
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 6, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('events', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
    public function actionEvent()
    {
        $id_evt = Yii::$app->request->get('id');
        $query = EventsList::find()->where('id = :id', [':id' => $id_evt])->one();
        if($query)
        {
            $query2 = EventImage::find()->where('id_event = :id_event', [':id_event' => $query->id])->all();
            if($query2)
            {
                foreach($query2 as $one){
                    $imgevent = base64_encode($one->img);
                    $img_items [] =  
                    [
                        'content' => Html::tag('div', '', ['class' => 'event-info-img', 'style' => "background-image: url(data:image/jpg;base64,$imgevent);"]),
                        'caption' => '',
                        'options' => [],
                    ];
                }
            }
            else{
                $imgevent = base64_encode($query->title_img);
                $img_items [] =  
                [
                    'content' => Html::tag('div', '', ['class' => 'event-info-img', 'style' => "background-image: url(data:image/jpg;base64,$imgevent);"]),
                    'caption' => '',
                    'options' => [],
                ];
            }
            return $this->render('event', [
                'event' => $query,
                'img_items' => $img_items
            ]);
        }
        else
        {
            return $this->redirect('site/error');
        }
    }
}
