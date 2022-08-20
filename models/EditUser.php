<?php
namespace app\models;
use yii\db\ActiveRecord;

class EditUser extends ActiveRecord
{

        public $userImgFile;
        public static function tableName()
        {
            return 'users'; // Имя таблицы в БД
        }
        public function rules() 
        {
            return 
            [
                [['name','email', 'phone','address', 'age_date' , 'passport', 'sex'],  'required', 'message' => 'Обязательно к заполнению'],             
                ['phone', 'unique', 'message' => 'Аккаунт с таким моб.номером уже существует'],
                ['email', 'unique', 'message' => 'Аккаунт с таким Email уже существует'],
                ['age_date', 'string'],
                ['userImgFile', 'file', 'maxSize' => 2000000], 
            ];
        }
}
