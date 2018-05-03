<?php
namespace backend\models;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\base\Model;
use Yii;

Class SignUpgurunextForm extends Model{
    public $firstname;
    public $username;
    public $level;
    public $guru_id;
    public $email;
    public $password;

    public function rules(){
        return[
            
            ['username', 'required'],
            ['firstname', 'required'],
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

    public function signup(){
        if($this->validate()){
            $user = new User();
            $user->firstname = $this->firstname;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->level = '2';
            $user->guru_id=$this->guru_id;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
            return $user;
        }
        return null;
    }

     public function listLevel()
     {
        $level = [
            ["id"=>"1","level"=>"siswa"],
            ["id"=>"2","level"=>"guru"],
            ["id"=>"3","level"=>"orangtua"],

            ];
        return ArrayHelper::map($level, "id", "level");
     }
}