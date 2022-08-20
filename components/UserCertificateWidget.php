<?php
namespace app\components;
use Yii;
use yii\base\Widget;
use app\models\EventsList;
 
class UserCertificateWidget extends Widget
{
    public function run()
    {
        $id_evt = Yii::$app->request->get('id');
        $event = EventsList::find()->where('id = :id', [':id' => $id_evt])->one();
        return $this->render('user_certificate', ['event' => $event]);
    }
}