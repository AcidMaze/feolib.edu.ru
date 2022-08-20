<?php
namespace app\components;
use Yii;
use yii\base\Widget;
use app\models\EventsList;
use app\models\EventСertificatesList;
 
class CertificateWidget extends Widget
{
    public function run()
    {
        $cookies = Yii::$app->request->cookies;
        $id_evt = Yii::$app->request->get('id');
        $model = new EventСertificatesList();
        $event = EventsList::find()->where('id = :id', [':id' => $id_evt])->one();
        if ($cookies->has('uniqueID'))
        {   
            $uniqueID = $cookies->getValue('uniqueID');
            $date = new \DateTime();
            if ($model->load(Yii::$app->request->post()) && $model->validate() && !$model->isInvite($uniqueID,$id_evt)) 
            {
                $model->id_user = $uniqueID;
                $model->id_event = $id_evt;  
                $model->date = $date->format('Y/m/d'); 
                $model->save();
                Yii::$app->session->setFlash('inviteSubmitted');
            }
        }
        return $this->render('certificate', [
            'event' => $event,
            'model' => $model,
        ]);
    }
}