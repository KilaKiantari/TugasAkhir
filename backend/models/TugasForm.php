<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use backend\models\Tugas;
use backend\models\Grup;

class TugasForm extends Model
{
    public $group_id;
    public $nama_tugas;
    public $keterangan;
    public $tanggal_tugas;
    public $author;
  

    public function rules()
    {
        return [
            [['group_id', 'nama_tugas', 'keterangan', 'tanggal_tugas', 'author'], 'required'],
            [['group_id', ], 'integer'],
            [['nama_tugas', 'keterangan', 'author'], 'string'],
            [['tanggal_tugas'], 'safe'],
        
        ];
    }

    public function attributeLabels()
    {
        return [
            'group_id' => 'Group id',
            'nama_tugas' => 'Nama Tugas',
            'keterangan' => 'Keterangan',
            'tanggal_tugas' => 'Tanggal Tugas',
            'author' =>'Author'

        ];
    }

    public function listGroup()
    {
        $grup = Grup::find()->all();
        return ArrayHelper::map($grup, 'id_group', 'namagroup');
    }

    public function listAuthor()
    {
        $author = [
            ["id"=>"g","author"=>"guru"],
           
        ];
        return ArrayHelper::map($author, "id", "author");
    }


}
