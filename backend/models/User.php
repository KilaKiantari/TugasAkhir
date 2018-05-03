<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $guru_id
 * @property integer $orangtua_id
 * @property integer $siswa_id
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $level
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['guru_id', 'orangtua_id', 'siswa_id', 'status', 'created_at', 'updated_at', 'level'], 'integer'],
            [['firstname', 'lastname'], 'string', 'max' => 50],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'guru_id' => 'Guru ID',
            'orangtua_id' => 'Orangtua ID',
            'siswa_id' => 'Siswa ID',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'level' => 'Level',
        ];
    }

        public function listLevel()
     {
        $level = [
            ["id"=>"3","level"=>"orangtua"],
            ["id"=>"2","level"=>"guru"]
            ["id"=>"1","level"=>"siswa"]


        ];
        return ArrayHelper::map($level, "id", "level");
     }
}
