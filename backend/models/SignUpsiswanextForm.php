<?php
namespace backend\models;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\base\Model;
use Yii;

Class SignUpsiswanextForm extends Model{
    public $firstname;
    public $lastname;
    public $username;
    public $level;
    public $siswa_id;
    public $email;
    public $password;

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

    public function signup(){
        if($this->validate()){
            $user = new User();
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->level = '1';
            $user->siswa_id=$this->siswa_id;
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
            ["id"=>"3","level"=>"orangtua"],
            ["id"=>"2","level"=>"guru"],
            ["id"=>"1","level"=>"siswa"],

        ];
        return ArrayHelper::map($level, "id", "level");
     }


}