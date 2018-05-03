<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use backend\models\Tugas;
use backend\models\Grup;

class GrupguruForm extends Model
{
    public $namagroup;
    public $matpel_id;
    public $guru_id;
  
  

    public function rules()
    {
        return [
            [['namagroup', 'matpel_id', 'guru_id', ], 'required'],
            [['matpel_id','guru_id'], 'integer'],
            [['namagroup'],'string'],
           
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'namagroup' => 'Nama Group',
            'matpel_id'=>'Matpel ID',
            'guru_id'=>'Guru_id',
           
        ];
    }

      public function listGuru()
    {
        $guru = Guru::find()->all();
        return ArrayHelper::map($guru, 'id_guru', 'nama_guru');
    }

     public function listMatpel()
    {
        $matapelajaran = Matapelajaran::find()->all();
        return ArrayHelper::map($matapelajaran, 'id_matpel', 'nama_matpel');
    }

}
