<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use backend\models\Tugas;
use backend\models\Grup;

class SignUpsiswaForm extends Model
{
    public $nama_lengkap;
    public $sekolah;
    public $orangtua_id;
   
   
  

    public function rules()
    {
        return [
            [['nama_lengkap', 'sekolah', 'orangtua_id'], 'required'],
            [['nama_lengkap', 'sekolah'], 'string'],
          
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'nama_lengkap' => 'Nama Lengkap',
            'sekolah' => 'Sekolah',
            'orangtua_id' => 'Orangtua ID',
           
            

        ];
    }

}
