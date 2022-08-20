<?php
namespace app\models;
use yii\db\ActiveRecord;

class UsersRegister extends ActiveRecord {

    public static function tableName() {
        return 'users';
    }

    public function rules() {
        return 
        [
            [['name', 'password', 'email', 'passport', 'sex'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['name'], 'string', 'max' => 64],
            ['email','email', 'message' => 'Введите корректный Email'],
            ['email', 'unique', 'message' => 'Аккаунт с таким Email уже существует'],
            ['phone', 'unique', 'message' => 'Аккаунт с таким моб. номером уже существует'],
            ['password', 'string', 'min'=>8, 'max'=>64]
        ];
    }

}