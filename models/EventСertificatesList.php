<?php
namespace app\models;
use yii\db\ActiveRecord;
use app\models\EventsList;
use app\models\UsersList;

class EventСertificatesList extends ActiveRecord
{

      public $iaccept;
      public static function tableName()
      {
            return 'event_certificates'; // Имя таблицы в БД
      }
      public function rules() 
      {
            return 
            [
                  [['id_user','id_event'], 'integer'],
                  ['iaccept', 'compare', 'compareValue' => 1, 'message' => 'Подтвердите что вы не робот'], 
            ];
      }

      public function isInvite($userID, $eventID) //Проверка на регистрацию
      {
            return $this::find()->where('id_event = :id_event AND id_user = :id_user', [':id_event' => $eventID,':id_user' => $userID])->exists(); 
      }

      public function getUserEventsId() {
            return $this->hasOne(EventsList::className(), ['id' => 'id_event']);
      }

      public function getUserEventTitle() 
      {
            return $this->userEventsId ? $this->userEventsId->title : null;
      }

      public function getUserEventDate() 
      {
            return $this->userEventsId ? $this->userEventsId->date : null;
      }

      public function getUserEventPlace() 
      {
            return $this->userEventsId ? $this->userEventsId->place : null;
      }

      public function getEventId() 
      {
            return $this->userEventsId ? $this->userEventsId->id : null;
      }

      public function getAllUserId() {
            return $this->hasMany($this::className(), ['id_event' => 'id_event']);
      }
        
      public function getUserCount() { 
            return count($this->allUserId);
      }

}