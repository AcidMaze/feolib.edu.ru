<?php
namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

class UsersLogin extends ActiveRecord {

    public static function tableName() {
        return 'users';
    }

    public function rules() {
        return 
        [
            [['email','password'],'required', 'message' => 'Поле должно быть заполнено'],
            [['email'], 'string', 'max' => 64],
            [['email','password'], 'string', 'max' => 64],
        ];
    }

}
