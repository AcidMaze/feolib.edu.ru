<?php
namespace app\models;
use yii\db\ActiveRecord;

class EventsList extends ActiveRecord
{
      public $fromDate;
      public $toDate;
      public static function tableName()
      {
            return 'events_list'; 
      }
      public function rules() 
      {
            return 
            [
                  [['fromDate','toDate'], 'string'],
            ];
      }

}