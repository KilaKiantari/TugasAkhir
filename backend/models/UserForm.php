<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use common\models\User;

use backend\models\Guru;


Class UserForm extends Model{
    public $firstname;
    public $lastname;
    public $username;
    public $level;
    public $email;
    public $password;
    public $idcabang;
    public $idguru;

    public function rules(){
        return[
            ['username', 'required'],
            ['firstname', 'required'],
            ['lastname', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already exists'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['level', 'required'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email has already exists'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function daftarUser(){
        if($this->validate()){
            $user = new User();
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->level = $this->level;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }
        return null;
    }

    public function getLevel()
    {
        $level = ["1"=>"admin","2"=>"siswa","3"=>"guru","4"=>"orangtua"];
        return $level[$this->level];
    }

    public function listLevel()
    {
        $level = [
            ["id"=>"1", "level"=>"admin"],
            ["id"=>"2", "level"=>"siswa"],
            ["id"=>"3", "level"=>"guru"],
            ["id"=>"4", "level"=>"orangtua"],
        ];
        return ArrayHelper::map($level, 'id', 'level');
    }
}