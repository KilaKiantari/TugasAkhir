<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use backend\models\Tugas;
use backend\models\Grup;

class SignUpguruForm extends Model
{
    public $nama_guru;
    public $tgl_lahir;
    public $sekolah;
    public $nama_matpel;
   
  

    public function rules()
    {
        return [
            [['nama_guru', 'tgl_lahir', 'sekolah', 'nama_matpel'], 'required'],
            [['nama_guru', 'sekolah','nama_matpel'], 'string'],
            [['tgl_lahir'], 'safe'],
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'nama_guru' => 'Nama Guru',
            'tgl_lahir' => 'Tanggal Lahir',
            'sekolah' => 'Sekolah',
            'nama_matpel' => 'Nama Matapelajaran',
            

        ];
    }

}
